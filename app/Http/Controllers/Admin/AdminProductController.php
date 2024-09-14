<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Utils\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'My Products';
        $viewData['products'] = Product::all();

        return view('admin.product.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Product';

        return view('admin.product.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Product::validate($request);
        $newProduct = new Product;
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setBrand($request->input('brand'));
        $newProduct->save();
        if ($request->hasFile('image')) {
            $imageName = ImageStorage::storeImage($newProduct, $request->file('image'), 'products');
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return back();
    }

    public function show(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = $product->getName();
        $viewData['product'] = $product;

        return view('admin.product.show')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData['title'] = 'Edit '.$product->getName();
        $viewData['product'] = $product;

        return view('admin.product.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        Product::validate($request);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setBrand($request->input('brand'));
        if ($request->hasFile('image')) {
            $imageName = ImageStorage::storeImage($newProduct, $request->file('image'), 'products');
            $product->setImage($imageName);
        }

        $product->save();

        return redirect()->route('admin.product.show', ['id' => $id]);
    }

    public function delete(string $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        ImageStorage::deleteImage($product, 'products');
        $product->delete();

        return redirect()->route('admin.product.index');
    }
}
