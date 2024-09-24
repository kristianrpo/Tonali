<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Colorimetry;
use App\Models\Product;
use App\Utils\ProductRecommendation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $query = $request->input('query');
        $filters = $request->only(['category_ids', 'ratings', 'price_ranges', 'stock_quantities']);
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

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%'.$query.'%')
            ->orWhere('brand', 'like', '%'.$query.'%')
            ->get();

        return view('product.index')->with('viewData', ['products' => $products]);
    }

    public function recommended(): View|RedirectResponse
    {
        $userId = Auth::user()->getId();
        $colorimetry = Colorimetry::where('user_id', $userId)->first();
        $viewData = [];

        if (! $colorimetry) {
            $viewData['colorimetry'] = null;
            $viewData['recommendation'] = null;

            return view('product.recommended')->with('viewData', $viewData);
        }

        $products = Product::select('id', 'description')->get();

        $aiGeneratedResponse = ProductRecommendation::recommendation($products, $colorimetry);
        $cleanedResponse = trim(preg_replace('/^```json|\s+|```$/', '', $aiGeneratedResponse));
        $productIds = json_decode($cleanedResponse, true);

        if (! is_array($productIds) || is_array($productIds) && empty($productIds)) {
            Session::flash('error', __('product.error_recommended'));

            return redirect()->route('home.index');
        }

        $recommendedProducts = Product::whereIn('id', $productIds)->get();
        $viewData['colorimetry'] = $colorimetry;
        $viewData['recommendation'] = $recommendedProducts;

        return view('product.recommended')->with('viewData', $viewData);
    }
}
