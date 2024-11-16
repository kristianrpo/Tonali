<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = new ProductCollection(Product::where('stock_quantity', '>', 0)->get());
        return response()->json($products, 200);
    }
    
    public function suggest(Request $request): JsonResponse
    {
        $query = $request->input('query');
        $suggestions = Product::getSuggestionsByName($query);

        return response()->json($suggestions, 200);
    }
}
