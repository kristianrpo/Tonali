<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['orders'] = Order::where('user_id', Auth::user()->getId())->get();

        return view('order.index')->with('viewData', $viewData);
    }

    public function place(Request $request): RedirectResponse
    {
        $productsInSession = $request->session()->get('products');
        if ($productsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order;
            $order->setUserId($userId);
            $order->save();

            $total = 0;
            $productsInCart = Product::findMany(array_keys($productsInSession));
            foreach ($productsInCart as $product) {
                $quantity = $productsInSession[$product->getId()];
                $item = new Item;
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setProductId($product->getId());
                $item->setOrderId($order->getId());
                $item->save();
                $total += $product->getPrice() * $quantity;
            }
            $order->setTotal($total);
            $order->save();

            $request->session()->forget('products');

            $viewData = [];
            $viewData['order'] = $order;
        }

        return redirect()->route('order.index');
    }
}
