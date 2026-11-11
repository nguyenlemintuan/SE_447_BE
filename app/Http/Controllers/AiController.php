<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Services\GeminiService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class AiController extends Controller
{
    public function __construct(private GeminiService $gemini)
    {
    }

    public function search(Request $request): JsonResponse
    {
        set_time_limit(120);

        $validated = $request->validate([
            'query' => ['required', 'string', 'min:2', 'max:500'],
        ]);

        if (!$this->gemini->configured()) {
            return $this->missingKey();
        }

        $query = trim($validated['query']);
        $catalog = $this->catalog();

        $catalogJson = $catalog->map(fn (Products $p) => [
            'id' => $p->id,
            'ten' => $p->title,
            'thuong_hieu' => $p->brand,
            'gia' => (int) $p->price,
            'mo_ta' => mb_substr((string) $p->description, 0, 160),
            'thong_so' => $this->specs($p),
        ])->toJson(JSON_UNESCAPED_UNICODE);

        $prompt = "Bạn là công cụ tìm kiếm sản phẩm công nghệ của LifeTech.\n"
            . "Danh sách sản phẩm đang bán (JSON):\n{$catalogJson}\n\n"
            . "Câu tìm kiếm của khách hàng: \"{$query}\"\n\n"
            . "Hãy hiểu tiếng Việt tự nhiên, từ đồng nghĩa, lỗi chính tả, viết tắt và các tiêu chí như ngân sách, thương hiệu, nhu cầu sử dụng. "
            . "Chỉ được chọn các id có trong danh sách. Nếu không có sản phẩm nào phù hợp, trả product_ids là mảng rỗng.\n"
            . "Trả về JSON đúng định dạng sau:\n"
            . "{\"summary\":\"1-2 câu tiếng Việt thân thiện giải thích vì sao chọn các sản phẩm này\","
            . "\"product_ids\":[1,2,3],"
            . "\"filters\":{\"brand\":null,\"min_price\":null,\"max_price\":null,\"category\":null}}\n"
            . "- product_ids: ưu tiên 3-8 id phù hợp nhất, xếp theo độ phù hợp giảm dần (chỉ trả ít hơn nếu danh sách không đủ sản phẩm phù hợp).\n"
            . "- filters.brand: chuỗi hoặc null; min_price/max_price: số VND hoặc null; category: \"điện thoại\", \"laptop\", \"máy tính bảng\", \"phụ kiện\" hoặc null.";

        $ai = $this->gemini->generateJson($prompt);
        $byId = $catalog->keyBy('id');

        $results = collect($ai['product_ids'] ?? [])
            ->map(fn ($id) => $byId->get((int) $id))
            ->filter()
            ->unique('id')
            ->take(8)
            ->values();

        if ($results->isEmpty()) {
            $results = $this->keywordSearch($catalog, $query);
        }

        $summary = $ai['summary'] ?? null;

        if (!$summary) {
            $summary = $results->isNotEmpty()
                ? 'Trợ lý AI đang bận nên mình tạm lọc theo từ khóa trong câu tìm kiếm. Bạn thử lại sau ít phút để nhận kết quả AI đầy đủ hơn nhé.'
                : 'Mình chưa tìm thấy sản phẩm phù hợp. Bạn thử mô tả ngắn hơn hoặc bỏ giới hạn ngân sách nhé.';
        }

        return response()->json([
            'status' => true,
            'summary' => $summary,
            'filters' => $this->normalizeFilters($ai['filters'] ?? []),
            'data' => $results->map(fn (Products $p) => $this->serialize($p))->values(),
        ]);
    }

    public function compare(Request $request): JsonResponse
    {
        set_time_limit(120);

        $validated = $request->validate([
            'product_ids' => ['required', 'array', 'min:2', 'max:4'],
            'product_ids.*' => ['integer', 'distinct'],
        ]);

        $byId = Products::with('reviews')
            ->whereIn('id', $validated['product_ids'])
            ->get()
            ->keyBy('id');

        $products = collect($validated['product_ids'])
            ->map(fn ($id) => $byId->get((int) $id))
            ->filter()
            ->values();

        if ($products->count() < 2) {
            return response()->json([
                'status' => false,
                'message' => 'Cần chọn ít nhất 2 sản phẩm hợp lệ để so sánh.',
            ], 422);
        }

        $ai = null;

        if ($this->gemini->configured()) {
            $productJson = $products->map(fn (Products $p) => [
                'id' => $p->id,
                'ten' => $p->title,
                'thuong_hieu' => $p->brand,
                'gia' => (int) $p->price,
                'bao_hanh_thang' => $p->warranty,
                'danh_gia_trung_binh' => $this->rating($p),
                'mo_ta' => mb_substr((string) $p->description, 0, 300),
                'thong_so' => $this->specs($p),
            ])->toJson(JSON_UNESCAPED_UNICODE);

            $prompt = "Bạn là chuyên gia tư vấn công nghệ của LifeTech.\n"
                . "Các sản phẩm cần so sánh (JSON):\n{$productJson}\n\n"
                . "Hãy so sánh khách quan dựa trên thông số, giá và mô tả. Không bịa thông số không có trong dữ liệu.\n"
                . "Trả về JSON đúng định dạng sau:\n"
                . "{\"summary\":\"1 đoạn 3-5 câu tiếng Việt so sánh tổng quan và kết luận\","
                . "\"winner_id\":1,"
                . "\"best_for\":[{\"product_id\":1,\"text\":\"phù hợp với ai, nhu cầu nào\"}],"
                . "\"pros\":[{\"product_id\":1,\"points\":[\"ưu điểm 1\",\"ưu điểm 2\"]}],"
                . "\"cons\":[{\"product_id\":1,\"points\":[\"hạn chế 1\"]}]}\n"
                . "- winner_id phải là id của sản phẩm được đánh giá phù hợp nhất với đa số người dùng.\n"
                . "- Mỗi sản phẩm có 1-3 ưu điểm và 1-2 hạn chế, ngắn gọn.\n"
                . "- Chỉ dùng các product_id trong danh sách trên.";

            $raw = $this->gemini->generateJson($prompt);

            if ($raw) {
                $validIds = $products->pluck('id')->all();
                $ai = [
                    'summary' => $raw['summary'] ?? null,
                    'winner_id' => in_array((int) ($raw['winner_id'] ?? 0), $validIds, true)
                        ? (int) $raw['winner_id']
                        : null,
                    'best_for' => $this->pointsByProduct($raw['best_for'] ?? [], $validIds, 'text'),
                    'pros' => $this->pointsByProduct($raw['pros'] ?? [], $validIds, 'points'),
                    'cons' => $this->pointsByProduct($raw['cons'] ?? [], $validIds, 'points'),
                ];
            }
        }

        return response()->json([
            'status' => true,
            'data' => $products->map(fn (Products $p) => $this->serialize($p))->values(),
            'ai' => $ai,
        ]);
    }

    public function recommend(Request $request): JsonResponse
    {
        set_time_limit(120);

        $validated = $request->validate([
            'needs' => ['required', 'string', 'min:5', 'max:1000'],
            'budget' => ['nullable', 'integer', 'min:0', 'max:200000000'],
        ]);

        if (!$this->gemini->configured()) {
            return $this->missingKey();
        }

        $catalog = $this->catalog();
        $needs = trim($validated['needs']);
        $budget = $validated['budget'] ?? null;

        $catalogJson = $catalog->map(fn (Products $p) => [
            'id' => $p->id,
            'ten' => $p->title,
            'thuong_hieu' => $p->brand,
            'gia' => (int) $p->price,
            'bao_hanh_thang' => $p->warranty,
            'danh_gia_trung_binh' => $this->rating($p),
            'mo_ta' => mb_substr((string) $p->description, 0, 160),
            'thong_so' => $this->specs($p),
        ])->toJson(JSON_UNESCAPED_UNICODE);

        $budgetText = $budget
            ? 'Ngân sách tối đa: ' . number_format($budget, 0, ',', '.') . ' VND.'
            : 'Khách chưa nêu ngân sách.';

        $prompt = "Bạn là trợ lý bán hàng công nghệ của LifeTech.\n"
            . "Danh sách sản phẩm đang bán (JSON):\n{$catalogJson}\n\n"
            . "Nhu cầu của khách hàng: \"{$needs}\"\n{$budgetText}\n\n"
            . "Hãy chọn tối đa 4 sản phẩm phù hợp nhất với nhu cầu. Ưu tiên đúng ngân sách, đúng nhu cầu sử dụng; "
            . "nếu ngân sách không đủ, có thể đề xuất sản phẩm gần nhất và nêu rõ trong lý do. Không bịa sản phẩm ngoài danh sách.\n"
            . "Trả về JSON đúng định dạng sau:\n"
            . "{\"summary\":\"1-2 câu tiếng Việt tóm tắt định hướng lựa chọn\","
            . "\"recommendations\":[{\"product_id\":1,\"reason\":\"vì sao phù hợp với nhu cầu, ngắn gọn 1-2 câu\",\"match_score\":90}]}\n"
            . "- recommendations: xếp theo độ phù hợp giảm dần, match_score từ 0 đến 100.\n"
            . "- Nếu không có sản phẩm phù hợp, trả recommendations là mảng rỗng và summary giải thích.";

        $ai = $this->gemini->generateJson($prompt);

        if (!$ai) {
            return response()->json([
                'status' => false,
                'message' => 'AI đang bận, bạn vui lòng thử lại sau ít phút.',
            ], 503);
        }

        $byId = $catalog->keyBy('id');

        $recommendations = collect($ai['recommendations'] ?? [])
            ->map(function ($item) use ($byId) {
                $product = $byId->get((int) ($item['product_id'] ?? 0));

                if (!$product) {
                    return null;
                }

                return array_merge($this->serialize($product), [
                    'reason' => (string) ($item['reason'] ?? ''),
                    'match_score' => max(0, min(100, (int) ($item['match_score'] ?? 0))),
                ]);
            })
            ->filter()
            ->unique('id')
            ->take(4)
            ->values();

        return response()->json([
            'status' => true,
            'summary' => $ai['summary'] ?? 'Đây là các sản phẩm phù hợp nhất với nhu cầu của bạn.',
            'data' => $recommendations,
        ]);
    }

    private function catalog(): Collection
    {
        return Products::with('reviews')
            ->where('status', 'active')
            ->where('quantity', '>', 0)
            ->get();
    }

    private function serialize(Products $product): array
    {
        return [
            'id' => $product->id,
            'title' => $product->title,
            'slug' => $product->slug,
            'images' => $product->images,
            'price' => (float) $product->price,
            'quantity' => (int) $product->quantity,
            'brand' => $product->brand,
            'description' => $product->description,
            'specs' => $this->specs($product),
            'warranty' => $product->warranty,
            'status' => $product->status,
            'avgRating' => $this->rating($product),
            'reviewCount' => $product->relationLoaded('reviews') ? $product->reviews->count() : 0,
            'sold_quantity' => 0,
        ];
    }

    private function rating(Products $product): float
    {
        if (!$product->relationLoaded('reviews') || $product->reviews->isEmpty()) {
            return 0;
        }

        return round((float) $product->reviews->avg('rating'), 1);
    }

    private function specs(Products $product): array
    {
        $raw = $product->specs;

        if (is_array($raw)) {
            return $raw;
        }

        $decoded = json_decode((string) $raw, true);

        return is_array($decoded) ? $decoded : [];
    }

    private function normalizeFilters(array $filters): array
    {
        return [
            'brand' => $filters['brand'] ?? null,
            'min_price' => isset($filters['min_price']) ? (int) $filters['min_price'] : null,
            'max_price' => isset($filters['max_price']) ? (int) $filters['max_price'] : null,
            'category' => $filters['category'] ?? null,
        ];
    }

    private function pointsByProduct(array $items, array $validIds, string $field): array
    {
        $result = [];

        foreach ($items as $item) {
            $id = (int) ($item['product_id'] ?? 0);

            if (!in_array($id, $validIds, true)) {
                continue;
            }

            $value = $item[$field] ?? null;

            if ($value === null) {
                continue;
            }

            $result[$id] = $value;
        }

        return $result;
    }

    private function keywordSearch(Collection $catalog, string $query): Collection
    {
        $normalized = $this->normalize($query);
        $tokens = collect(preg_split('/\s+/', $normalized))
            ->filter(fn ($token) => mb_strlen($token) >= 2 && !in_array($token, $this->stopWords(), true))
            ->unique()
            ->values();

        [$minPrice, $maxPrice] = $this->extractBudget($normalized);

        $inBudget = function (Products $product) use ($minPrice, $maxPrice) {
            $price = (float) $product->price;

            return ($minPrice === null || $price >= $minPrice)
                && ($maxPrice === null || $price <= $maxPrice);
        };

        $results = $catalog
            ->filter(fn (Products $product) => $inBudget($product))
            ->map(function (Products $product) use ($tokens) {
                $haystack = $this->normalize(
                    $product->title . ' ' . $product->brand . ' ' . $product->description . ' '
                    . json_encode($this->specs($product), JSON_UNESCAPED_UNICODE)
                );

                $score = $this->matchScore($haystack, $tokens);

                return ['product' => $product, 'score' => $score];
            })
            ->filter(fn ($row) => $row['score'] > 0)
            ->sortByDesc('score')
            ->pluck('product')
            ->values();

        // Khi AI bận và từ khóa quá ít kết quả, bổ sung máy còn dư ngân sách để khách có lựa chọn
        if ($results->count() < 3 && ($minPrice !== null || $maxPrice !== null)) {
            $picked = $results->pluck('id');

            $fill = $catalog
                ->filter(fn (Products $product) => !$picked->contains($product->id) && $inBudget($product))
                ->sortByDesc('price')
                ->take(8 - $results->count())
                ->values();

            $results = $results->merge($fill)->values();
        }

        return $results->take(8);
    }

    private function matchScore(string $haystack, Collection $tokens): int
    {
        $score = 0;

        foreach ($tokens as $token) {
            if (str_contains($haystack, $token)) {
                $score += 2;

                continue;
            }

            foreach ($this->synonyms($token) as $word) {
                if (str_contains($haystack, $word)) {
                    $score += 1;

                    break;
                }
            }
        }

        return $score;
    }

    private function synonyms(string $token): array
    {
        return match ($token) {
            'chup' => ['camera', 'leica', 'mp'],
            'anh' => ['camera', 'leica'],
            'camera' => ['chup', 'leica', 'mp'],
            'game', 'gaming' => ['chip', 'ram', 'snapdragon', 'dimensity', 'gen'],
            'pin' => ['mah', 'sac'],
            'man' => ['oled', 'amoled', 'retina', 'hinch'],
            'nhe' => ['compact', 'nho', 'gon'],
            're' => ['gia re', 'affordable', 'tiep can'],
            default => [],
        };
    }

    private function extractBudget(string $text): array
    {
        $min = null;
        $max = null;

        preg_match_all('/(\d+(?:[.,]\d+)?)\s*(trieu|tr|m)\b/u', $text, $millions);
        preg_match_all('/(\d{1,3}(?:\.\d{3})+|\d{7,})\s*(?:d|vnd|dong)?\b/u', $text, $rawVnd);

        $values = collect($millions[1] ?? [])
            ->map(fn ($value) => (float) str_replace(',', '.', $value) * 1000000)
            ->merge(collect($rawVnd[1] ?? [])->map(fn ($value) => (float) str_replace('.', '', $value)))
            ->filter(fn ($value) => $value > 0)
            ->values();

        if ($values->isEmpty()) {
            return [null, null];
        }

        if ($values->count() >= 2) {
            return [$values->min(), $values->max()];
        }

        $value = $values->first();

        if (str_contains($text, 'duoi') || str_contains($text, 'toi da')) {
            $max = $value;
        } elseif (str_contains($text, 'tren') || str_contains($text, 'tu ')) {
            $min = $value;
        } else {
            $max = $value;
        }

        return [$min, $max];
    }

    private function normalize(string $text): string
    {
        return Str::ascii(mb_strtolower($text));
    }

    private function stopWords(): array
    {
        return [
            'toi', 'minh', 'muon', 'can', 'tim', 'mua', 'cho', 'co', 'khong', 'duoi', 'tren',
            'tam', 'trieu', 'gia', 'san', 'pham', 'dien', 'thoai', 'laptop', 'may', 'tinh',
            'bang', 'phu', 'kien', 'la', 'va', 'cua', 'voi', 'mot', 'cai', 'nao', 'gi', 'dep',
            'tot', 'hay', 'nhat', 'shop', 'cua', 'hang', 'nao',
        ];
    }

    private function missingKey(): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => 'Tính năng AI chưa được cấu hình. Vui lòng thêm GEMINI_API_KEY vào file .env.',
        ], 503);
    }
}
