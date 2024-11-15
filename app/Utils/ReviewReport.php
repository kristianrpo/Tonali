<?php

namespace App\Utils;

use App\Interfaces\LanguageModel;

class ReviewReport
{
    public function report(string $reportTitle, string $reportDescription): string
    {
        $languageModelInterface = app(LanguageModel::class);
        $prompt = __('prompt.context_report_review');
        $prompt .= __('prompt.report_title_label').$reportTitle."\n";
        $prompt .= __('prompt.report_description_label').$reportDescription."\n";
        $prompt .= __('prompt.reported_review_label').$this->attributes['description']."\n";
        $response = $languageModelInterface->generateText($prompt);

        return $response;
    }
}
