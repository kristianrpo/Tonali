<?php

namespace App\Services;

use App\Interfaces\LanguageModel;
use OpenAI;

class OpenAIService implements LanguageModel
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(config('services.openai.key'));
    }

    public function generateText(string $prompt, int $maxTokens = 150): string
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => __('prompt.characterization')],
                ['role' => 'user', 'content' => $prompt],
            ],
            'max_tokens' => $maxTokens,
        ]);

        return $response['choices'][0]['message']['content'];
    }
}
