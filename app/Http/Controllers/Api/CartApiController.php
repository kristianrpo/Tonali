<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartApiController extends Controller
{
    public function update(Request $request): JsonResponse
    {
        $id = $request->input('id');
        $productsInSession = $request->session()->get('products');
        $productsInSession[$id] = $request->input('quantity');
        $request->session()->put('products', $productsInSession);
        $productsInCart = Product::findMany(array_keys($productsInSession));
        $total = formatPrice(Product::sumPricesByQuantities($productsInCart, $productsInSession));

        return response()->json(['total' => $total], 200);
    }
}
