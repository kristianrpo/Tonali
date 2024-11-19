<?php

namespace App\Providers;

use App\Interfaces\LanguageModel;
use App\Services\HuggingFaceService;
use App\Services\OpenAIService;
use Illuminate\Support\ServiceProvider;

class LanguageModelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LanguageModel::class, function () {
            $services_options = ['openai', 'huggingface'];
            $service = $services_options[random_int(0, 1)];
            if ($service === 'openai') {
                return new OpenAIService;
            } elseif ($service === 'huggingface') {
                return new HuggingFaceService;
            }
        });
    }
}
