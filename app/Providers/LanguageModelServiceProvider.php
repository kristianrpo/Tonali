<?php

namespace App\Providers;

use App\Interfaces\LanguageModel;
use App\Services\OpenAIService;
use Illuminate\Support\ServiceProvider;

class LanguageModelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(LanguageModel::class, function () {
            return new OpenAIService;
        });
    }
}
