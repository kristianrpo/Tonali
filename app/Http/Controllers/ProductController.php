<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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

        $averageRating = $product->getAverageRating();
        $calculatedStars = floor($averageRating);

        $userId = Auth::id();

        $viewData['product'] = $product;
        $viewData['relatedProducts'] = $product->getRelatedProducts();
        $viewData['averageRating'] = $averageRating;
        $viewData['calculatedStars'] = $calculatedStars;
        $viewData['userId'] = $userId;

        return view('product.show')->with('viewData', $viewData);
    }

    public function search(Request $request): View|RedirectResponse
    {
        $query = $request->input('query');
        if (empty($query)) {
            return redirect()->route('product.index');
        }

        $viewData = [];
        $products = Product::searchProducts($query)->get();
        $viewData['products'] = $products;
        $viewData['priceRanges'] = Product::getPriceTerciles();
        $viewData['categories'] = Category::all();

        if ($products->isEmpty()) {
            session()->flash('message', __('product.no_products'));

            return redirect()->route('product.index');
        }

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
