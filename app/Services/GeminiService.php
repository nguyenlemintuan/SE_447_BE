<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    private string $key;
    private string $chatModel;
    private string $embeddingModel;
    private array $chatModels;

    public function __construct()
    {
        $this->key = (string) config('services.gemini.key');
        $this->chatModel = (string) config('services.gemini.chat_model', 'gemini-3.6-flash');
        $this->embeddingModel = (string) config('services.gemini.embedding_model', 'gemini-embedding-001');

        $fallback = (string) config('services.gemini.fallback_chat_model', '');
        $this->chatModels = array_values(array_unique(array_filter([$this->chatModel, $fallback])));
    }

    public function configured(): bool
    {
        return trim($this->key) !== '';
    }

    public function generateText(string $prompt): ?string
    {
        $data = $this->generate($prompt, null);

        return $data['candidates'][0]['content']['parts'][0]['text'] ?? null;
    }

    public function generateJson(string $prompt): ?array
    {
        $data = $this->generate($prompt, 'application/json');
        $text = $data['candidates'][0]['content']['parts'][0]['text'] ?? null;

        if (!$text) {
            return null;
        }

        $json = json_decode($text, true);

        if (!is_array($json)) {
            $clean = preg_replace('/^```(?:json)?\s*|\s*```$/m', '', trim($text));
            $json = json_decode((string) $clean, true);
        }

        return is_array($json) ? $json : null;
    }

    public function embed(string $text): ?array
    {
        if (!$this->configured()) {
            return null;
        }

        try {
            $response = Http::timeout(20)->post($this->url($this->embeddingModel, 'embedContent'), [
                'content' => [
                    'parts' => [['text' => $text]],
                ],
            ]);

            return $response->json()['embedding']['values'] ?? null;
        } catch (\Throwable $e) {
            $this->logFailure('embedContent', $e);

            return null;
        }
    }

    private function generate(string $prompt, ?string $responseMimeType): ?array
    {
        if (!$this->configured()) {
            return null;
        }

        $payload = [
            'contents' => [
                ['role' => 'user', 'parts' => [['text' => $prompt]]],
            ],
            'generationConfig' => ['temperature' => 0.4],
        ];

        if ($responseMimeType) {
            $payload['generationConfig']['responseMimeType'] = $responseMimeType;
        }

        try {
            foreach ($this->chatModels as $model) {
                $response = Http::timeout(60)->post($this->url($model, 'generateContent'), $payload);

                if ($response->successful()) {
                    return $response->json();
                }

                Log::warning('Gemini generateContent failed', [
                    'model' => $model,
                    'status' => $response->status(),
                    'body' => substr((string) $response->body(), 0, 300),
                ]);

                if (!in_array($response->status(), [429, 500, 502, 503, 504], true)) {
                    break;
                }
            }

            return null;
        } catch (\Throwable $e) {
            $this->logFailure('generateContent', $e);

            return null;
        }
    }

    private function url(string $model, string $method): string
    {
        return "https://generativelanguage.googleapis.com/v1beta/models/{$model}:{$method}?key={$this->key}";
    }

    private function logFailure(string $method, \Throwable $e): void
    {
        Log::error("Gemini {$method} failed: " . preg_replace('/key=[^&\s]+/', 'key=***', $e->getMessage()));
    }
}
