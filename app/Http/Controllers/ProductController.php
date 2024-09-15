<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'My Products';
        $viewData['products'] = Product::all();

        return view('product.index')->with('viewData', $viewData);
    }
}    