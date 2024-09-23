<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $query = $request->input('query');
        $filters = $request->only(['category_id', 'rating', 'price_range', 'stock_quantity']);
        $productsQuery = Product::query();
        if (! empty($query)) {
            $productsQuery = Product::search($query);
        }
        if (! empty($filters)) {
            $productsQuery = Product::filter($filters);
        }
        $products = $productsQuery->get();

        if ($products->isEmpty()) {
            session()->flash('message', __('product.no_products'));
        }
        $viewData['products'] = $products;
        $viewData['priceRanges'] = Product::getPriceTerciles();
        $viewData['categories'] = Category::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function suggest(Request $request): JsonResponse
    {
        $query = $request->input('query');
        $suggestions = Product::getSuggestionsByName($query);

        return response()->json($suggestions);
    }

    public function show(int $id): View
    {
        $viewData = [];

        $product = Product::with('reviews')->findOrFail($id);

        $reviews = $product->reviews()->with('user')->orderBy('created_at', 'desc')->paginate(5);

        $averageRating = $product->getAverageRating();
        $calculatedStars = floor($averageRating);

        $userId = Auth::id();

        $viewData['product'] = $product;
        $viewData['reviews'] = $reviews;
        $viewData['relatedProducts'] = $product->getRelatedProducts();
        $viewData['averageRating'] = $averageRating;
        $viewData['calculatedStars'] = $calculatedStars;
        $viewData['userId'] = $userId;

        return view('product.show')->with('viewData', $viewData);
    }
}
