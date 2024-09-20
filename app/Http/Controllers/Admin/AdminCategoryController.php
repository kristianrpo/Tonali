<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $categories = Category::all();
        $viewData['categories'] = $categories;
    }

    public function create(): View
    {
        return view('admin.category.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Category::validate($request);
        $newCategory = new Category;
        $newCategory->setName($request->input('name'));
        $newCategory->setDescription($request->input('description'));
        $newCategory->save();

        return back();
    }

    public function show(int $id): View
    {
        $viewData = [];
        $category = Category::findOrFail($id);
        $viewData['category'] = $category;

        return view('admin.category.show')->with('viewData', $viewData);
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $category = Category::findOrFail($id);
        $viewData['category'] = $category;

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Category::validate($request);
        $category = Category::findOrFail($id);
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));
        $category->save();

        return redirect()->route('admin.category.show', ['id' => $id]);
    }

    public function delete(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index');
    }
}
