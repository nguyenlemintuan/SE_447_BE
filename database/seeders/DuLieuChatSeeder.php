<?php

namespace Database\Seeders;

use App\Models\DuLieuChat;
use App\Models\Products;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class DuLieuChatSeeder extends Seeder
{
    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GEMINI_API_KEY');
    }

    public function run(): void
    {
        DuLieuChat::truncate();

        // 1. Train static data
        $this->trainStaticData();

        // 2. Train products
        $this->trainProducts();

        // 3. Train vouchers
        $this->trainVouchers();
    }

    private function trainStaticData(): void
    {
        $items = [
            "SHOP SE397 chuyên bán điện thoại chính hãng.",
            "Giờ làm việc: 08:00 - 21:00 mỗi ngày. Hotline: 0909 888 777. Email: support@shopse397.com.",
            "Chính sách bảo hành: đổi trả trong 7 ngày nếu lỗi phần cứng, bảo hành tối thiểu 12 tháng tùy sản phẩm.",
            "Hỗ trợ giao hàng toàn quốc, thanh toán COD hoặc chuyển khoản.",
            "SHOP SE397 KHÔNG bán: quần áo, giày dép, túi xách, thực phẩm, hoặc các mặt hàng không liên quan công nghệ.",
        ];

        foreach ($items as $text) {
            $this->upsertEmbedding($text);
        }
    }

    private function trainProducts(): void
    {
        // Whitelist brand công nghệ
        $techBrands = [
            'Apple',
            'Samsung',
            'Xiaomi',
            'Oppo',
            'Vivo',
            'Realme',
            'Poco',
            'iPhone',
            'iPad',
            'MacBook',
            'iWatch',
            'Dell',
            'HP',
            'Asus',
            'Lenovo',
            'Acer',
            'MSI',
            'Razer',
            'Sony',
            'LG',
            'Panasonic',
            'Philips',
            'JBL',
            'Bose',
            'Beats',
            'Google',
            'Nokia',
            'Motorola'
        ];

        // Keywords công nghệ để filter
        $techKeywords = [
            'điện thoại',
            'phone',
            'laptop',
            'máy tính',
            'tablet',
            'watch',
            'headphone',
            'speaker',
            'camera',
            'ipad',
            'macbook',
            'airpods',
            'charger',
            'pin',
            'cáp',
            'kính'
        ];

        $query = Products::where('status', 'active');
        $products = $query->get();

        foreach ($products as $p) {
            // Filter: chỉ train nếu brand trong whitelist hoặc title/description có keyword công nghệ
            $brandMatch = collect($techBrands)->contains(fn($b) => stripos($p->brand, $b) !== false);
            $titleMatch = collect($techKeywords)->contains(fn($k) => stripos($p->title, $k) !== false);
            $descMatch = collect($techKeywords)->contains(fn($k) => stripos($p->description, $k) !== false);

            if (!($brandMatch || $titleMatch || $descMatch)) {
                continue; // Bỏ qua sản phẩm không phải công nghệ
            }

            $specsText = '';
            if (!empty($p->specs)) {
                $specs = is_array($p->specs) ? $p->specs : @json_decode($p->specs, true);
                if (is_array($specs)) {
                    foreach ($specs as $k => $v) {
                        $specsText .= "{$k}: {$v}; ";
                    }
                }
            }

            $text = "Sản phẩm: {$p->title}. " .
                "Thương hiệu: {$p->brand}. " .
                "Giá: " . number_format((float)$p->price, 0, ',', '.') . " VND. " .
                "Bảo hành: {$p->warranty} tháng. " .
                (!empty($p->description) ? "Mô tả: {$p->description}. " : "") .
                (!empty($specsText) ? "Thông số: {$specsText}" : "");

            $this->upsertEmbedding($text);
        }
    }

    private function trainVouchers(): void
    {
        $vouchers = Voucher::all();

        foreach ($vouchers as $v) {
            $text = "Voucher: {$v->ma_code}. " .
                "Mô tả: {$v->ten_voucher}. " .
                "Giá trị: {$v->so_giam_gia} " . ($v->loai_giam == 1 ? 'phần trăm' : 'VND') . ". " .
                "Điều kiện: Đơn hàng tối thiểu {$v->don_hang_toi_thieu} VND. " .
                "Hiệu lực: từ {$v->thoi_gian_bat_dau} đến {$v->thoi_gian_ket_thuc}. " .
                "Trạng thái: " . ($v->tinh_trang == 1 ? 'Hoạt động' : 'Vô hiệu hóa') . ".";

            $this->upsertEmbedding($text);
        }
    }

    private function upsertEmbedding(string $content): void
    {
        $hash = sha1(trim($content));

        if (DuLieuChat::where('hash', $hash)->exists()) {
            return;
        }

        $embedding = $this->createEmbedding($content);
        if (!$embedding) {
            // Nếu API fail, tạo embedding rỗng (sẽ update sau)
            $embedding = [];
        }

        DuLieuChat::create([
            'content' => $content,
            'embedding' => json_encode($embedding),
            'hash' => $hash,
        ]);

        // Rate limiting
        usleep(120000);
    }

    private function createEmbedding(string $text): ?array
    {
        if (empty($this->apiKey)) {
            return null;
        }

        try {
            $res = Http::retry(2, 200)
                ->timeout(10)
                ->post(
                    "https://generativelanguage.googleapis.com/v1beta/models/gemini-embedding-001:embedContent?key={$this->apiKey}",
                    [
                        'content' => [
                            'parts' => [
                                ['text' => $text]
                            ]
                        ]
                    ]
                );

            if (!$res->ok()) {
                return null;
            }

            return $res->json()['embedding']['values'] ?? null;
        } catch (\Exception $e) {
            return null;
        }
    }
}
