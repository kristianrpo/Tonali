<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'My Products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%' . $query . '%')
        ->orWhere('brand', 'like', '%' . $query . '%')
        ->get();
        return view('product.index')->with('viewData', ['products' => $products]);
    }

}    