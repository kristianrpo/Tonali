<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);

        $averageRating = $product->getAverageRating();
        $calculatedStars = floor($averageRating);

        $viewData['product'] = $product;
        $viewData['averageRating'] = $averageRating;
        $viewData['calculatedStars'] = $calculatedStars;

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
}
