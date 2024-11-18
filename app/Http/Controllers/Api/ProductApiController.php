<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index(): JsonResponse
    {
        $products = ProductResource::collection(Product::where('stock_quantity', '>', 0)->get());

        return response()->json($products, 200);
    }

    public function show(string $id): JsonResponse
    {
        $product = new ProductResource(Product::findOrFail($id));

        return response()->json($product, 200);
    }

    public function paginate(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 10);

        if (! is_numeric($perPage) || $perPage <= 0) {
            return response()->json([
                __('pagination.error'),
            ], 400);
        }

        $products = new ProductCollection(Product::where('stock_quantity', '>', 0)->paginate((int) $perPage));

        return response()->json($products, 200);
    }

    public function suggest(Request $request): JsonResponse
    {
        $query = $request->input('query');
        $suggestions = Product::getSuggestionsByName($query);

        return response()->json($suggestions, 200);
    }
}
