<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $products = Product::all();
        $viewData['products'] = $products;
        $viewData['priceRanges'] = Product::getPriceTerciles();
        $viewData['categories'] = Category::all();

        return view('product.index')->with('viewData', $viewData);
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

    public function search(Request $request): RedirectResponse|JsonResponse|View
    {
        $query = $request->input('query');
        if (empty($query)) {
            return redirect()->route('product.index');
        }

        if ($request->ajax()) {
            $suggestions = Product::getSuggestionsByName($query);

            return response()->json($suggestions);
        }

        $viewData = [];
        $products = Product::searchProducts($query)->get();

        if ($products->isEmpty()) {
            session()->flash('message', __('product.no_products'));

            return redirect()->route('product.index');
        }

        $viewData['products'] = $products;
        $viewData['priceRanges'] = Product::getPriceTerciles();
        $viewData['categories'] = Category::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function filter(Request $request)
    {
        $filters = $request->only(['category_id', 'rating', 'price_range']);

        $viewData = [];
        $products = Product::filterProducts($filters)->get();
        $viewData['products'] = $products;
        $viewData['priceRanges'] = Product::getPriceTerciles();
        $viewData['categories'] = Category::all();

        return view('product.index')->with('viewData', $viewData);
    }
}
