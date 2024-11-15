<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function suggest(Request $request): JsonResponse
    {
        $query = $request->input('query');
        $suggestions = Product::getSuggestionsByName($query);

        return response()->json($suggestions, 200);
    }
}
