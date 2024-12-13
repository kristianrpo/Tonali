<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Order::where('user_id', Auth::user()->getId())->get();
        $viewData['breadcrumbs'] = [
            ['label' => __('layoutApp.home'), 'url' => route('home.index')],
            ['label' => __('order.order'), 'url' => null],
        ];

        return view('order.index')->with('viewData', $viewData);
    }

    public function place(Request $request): RedirectResponse
    {
        $productsInSession = $request->session()->get('products');
        if (! $productsInSession) {
            return redirect()->route('cart.index');
        }

        $productsInCart = Product::findMany(array_keys($productsInSession));

        foreach ($productsInCart as $product) {
            $quantity = $productsInSession[$product->getId()];
            if ($product->getStockQuantity() < $quantity) {
                Session::flash('error', __('order.place_error', ['product' => $product->getName()]));

                return redirect()->route('cart.index');
            }
        }

        $userId = Auth::user()->getId();
        $order = new Order;
        $order->setUserId($userId);
        $order->save();

        $total = 0;

        foreach ($productsInCart as $product) {
            $quantity = $productsInSession[$product->getId()];

            $item = new Item;
            $item->setQuantity($quantity);
            $item->setPrice($product->getPrice());
            $item->setProductId($product->getId());
            $item->setOrderId($order->getId());
            $item->save();

            $product->setStockQuantity($product->getStockQuantity() - $quantity);
            $product->save();

            $total += $product->getPrice() * $quantity;
        }

        $order->setTotal($total);
        $order->save();

        $request->session()->forget('products');
        Session::flash('success', __('order.place_success'));

        return redirect()->route('order.index');
    }
}
