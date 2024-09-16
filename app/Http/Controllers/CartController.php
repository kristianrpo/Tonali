<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $productsInCart = [];
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $productsInCart = Product::findMany(array_keys($productsInSession));
            $total = Product::sumPricesByQuantities($productsInCart, $productsInSession);
        }
        $viewData = [];
        $viewData['total'] = formatPrice($total);
        $viewData['products'] = $productsInCart;

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, int $id): RedirectResponse
    {
        $products = $request->session()->get('products');
        if (isset($products[$id])) {
            $products[$id]++;
            $request->session()->put('products', $products);

            return redirect()->route('cart.index');
        } else {
            $products[$id] = 1;
            $request->session()->put('products', $products);

            return redirect()->route('cart.index');
        }
    }

    public function update(Request $request): JsonResponse
    {
        $id = $request->input('id');
        $productsInSession = $request->session()->get('products');
        $productsInSession[$id] = $request->input('quantity');
        $request->session()->put('products', $productsInSession);
        $productsInCart = Product::findMany(array_keys($productsInSession));
        $total = formatPrice(Product::sumPricesByQuantities($productsInCart, $productsInSession));

        return response()->json([
            'total' => $total,
        ]);
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $productsInSession = $request->session()->get('products');
        unset($productsInSession[$id]);
        $request->session()->put('products', $productsInSession);

        return back();
    }
}
