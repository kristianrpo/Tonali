<?php

namespace App\Services;

use App\Interfaces\LanguageModel;
use Illuminate\Support\Facades\Http;

class HuggingFaceService implements LanguageModel
{
    protected $apiKey;

    public function __construct()
    {
        $this->serviceName = 'Hugging Face';
        $this->apiKey = config('services.huggingface.key');
    }

    public function generateText(string $prompt, int $maxTokens = 150): string
    {
        $model = 'mistralai/Mixtral-8x7B-Instruct-v0.1';

        $messages = [__('prompt.characterization'), $prompt];

        $inputText = implode("\n", $messages);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$this->apiKey,
        ])->post("https://api-inference.huggingface.co/models/${model}", [
            'inputs' => $inputText,
            'parameters' => [
                'max_new_tokens' => $maxTokens,
                'return_full_text' => false,
            ],
        ]);

        $result = $response->json();

        return $result[0]['generated_text'];
    }

    public function getServiceName(): string
    {
        return $this->serviceName;
    }
}
