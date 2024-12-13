<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('cart.title'), 'url' => null],
        ];

        return view('cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, int $id): RedirectResponse
    {
        $products = $request->session()->get('products');
        if (isset($products[$id])) {
            $products[$id]++;
            $request->session()->put('products', $products);
        } else {
            $products[$id] = 1;
            $request->session()->put('products', $products);
        }

        Session::flash('success', __('cart.add_product_success'));

        return redirect()->route('cart.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        $id = $request->input('id');
        $productsInSession = $request->session()->get('products');
        unset($productsInSession[$id]);
        $request->session()->put('products', $productsInSession);

        Session::flash('success', __('cart.delete_product_success'));

        return back();
    }
}
