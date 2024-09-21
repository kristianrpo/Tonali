<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Utils\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $products = Product::paginate(10);
        $viewData['products'] = $products;

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function search(Request $request): View
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', '%'.$query.'%')
            ->orWhere('brand', 'like', '%'.$query.'%')
            ->paginate(10);

        return view('admin.product.index')->with('viewData', ['products' => $products]);
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

        return redirect()->route('admin.product.show', ['id' => $id]);
    }

    public function delete(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        ImageStorage::deleteImage($product, 'products');
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
