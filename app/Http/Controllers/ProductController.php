<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): View
    {
        $viewData = [];
        $products = Product::all();
        $viewData = $this->productService->getCommonData($products);

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
        $products = $this->productService->searchProducts($query)->get();
        $viewData = $this->productService->getCommonData($products);

        if ($products->isEmpty()) {
            session()->flash('message', __('product.no_products'));

            return redirect()->route('product.index');
        }

        return view('product.index')->with('viewData', $viewData);
    }

    public function filter(Request $request)
    {
        $filters = $request->only(['category_id', 'rating', 'price_range']);
        $products = $this->productService->filterProducts($filters)->get();

        $viewData = $this->productService->getCommonData($products);

        return view('product.index')->with('viewData', $viewData);
    }
}
