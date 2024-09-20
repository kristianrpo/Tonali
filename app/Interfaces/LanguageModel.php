<?php

namespace App\Interfaces;

interface LanguageModel
{
    public function generateText(string $prompt, int $maxTokens = 150): string;
}
