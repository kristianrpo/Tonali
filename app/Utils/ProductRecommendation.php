<?php

namespace App\Utils;

use App\Interfaces\LanguageModel;
use App\Models\Colorimetry;
use Illuminate\Database\Eloquent\Collection;

class ProductRecommendation
{
    public static function recommendation(Collection $products, Colorimetry $colorimetry): string
    {
        $languageModelInterface = app(LanguageModel::class);

        $specificNeedsText = implode(', ', json_decode($colorimetry->getSpecificNeeds()));

        $productList = json_encode($products->map(function ($product) {
            return [
                'id' => $product->getId(),
                'description' => $product->getDescription(),
            ];
        })->toArray());

        $prompt = __('prompt.context_recommendation_products');
        $prompt .= __('prompt.colorimetry_skinTone_label').$colorimetry->getSkinTone()."\n";
        $prompt .= __('prompt.colorimetry_skinUndertone_label').$colorimetry->getSkinUndertone()."\n";
        $prompt .= __('prompt.colorimetry_hairColor_label').$colorimetry->getHairColor()."\n";
        $prompt .= __('prompt.colorimetry_eyeColor_label').$colorimetry->getEyeColor()."\n";
        $prompt .= __('prompt.colorimetry_specificNeeds_label').$specificNeedsText."\n";
        $prompt .= __('prompt.products_label').$productList."\n";
        $response = $languageModelInterface->generateText($prompt);

        return $response;
    }
}
