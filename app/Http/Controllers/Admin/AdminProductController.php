<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Utils\ImageStorage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $query = $request->input('query');
        $filters = $request->only(['category_ids', 'ratings', 'price_ranges', 'stock_quantities']);
        $productsQuery = Product::query();
        if (! empty($query)) {
            $productsQuery = Product::search($query);
        }
        if (! empty($filters)) {
            $productsQuery = Product::filter($filters);
        }
        $products = $productsQuery->paginate(10);

        if ($products->isEmpty()) {
            session()->flash('message', __('product.no_products'));
        }
        $viewData['products'] = $products;
        $viewData['priceRanges'] = Product::getPriceTerciles();
        $viewData['categories'] = Category::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function suggest(Request $request): JsonResponse
    {
        $query = $request->input('query');
        $suggestions = Product::getSuggestionsByName($query);

        return response()->json($suggestions);
    }

    public function create(): View
    {
        $viewData = [];
        $categories = Category::all();
        $viewData['categories'] = $categories;

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Product::validate($request);
        $newProduct = new Product;
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setBrand($request->input('brand'));
        $newProduct->setCategoryId($request->input('category_id'));
        $newProduct->setStockQuantity($request->input('stock_quantity'));
        $newProduct->save();
        if ($request->hasFile('image')) {
            $imageName = ImageStorage::storeImage($newProduct, $request->file('image'), 'products');
            $newProduct->setImage($imageName);
            $newProduct->save();
        }
        Session::flash('success', __('product.add_success'));

        return back();
    }

    public function show(int $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['product'] = $product;

        return view('admin.product.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $viewData['product'] = $product;
        $viewData['categories'] = $categories;

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Product::validate($request);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setBrand($request->input('brand'));
        $product->setCategoryId($request->input('category_id'));
        $product->setStockQuantity($request->input('stock_quantity'));
        if ($request->hasFile('image')) {
            $imageName = ImageStorage::storeImage($product, $request->file('image'), 'products');
            $product->setImage($imageName);
        }

        $product->save();

        Session::flash('success', __('product.update_success'));

        return redirect()->route('admin.product.show', ['id' => $id]);
    }

    public function delete(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        ImageStorage::deleteImage($product, 'products');
        $product->delete();

        Session::flash('success', __('product.delete_success'));

        return redirect()->route('admin.product.index');
    }
}
