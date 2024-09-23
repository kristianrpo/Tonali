<?php

namespace App\Exceptions;

use Exception;

class ProductRecommendationException extends Exception
{
    public function render($request)
    {
        return response()->view('error.product_recommendation', [], 500);
    }
}
