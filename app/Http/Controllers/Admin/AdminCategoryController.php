<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminCategoryController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $categories = Category::all();
        $viewData['categories'] = $categories;
        $viewData['breadcrumbs'] = [
            ['label' => __('admin.admin'), 'url' => route('admin.index')],
            ['label' => __('category.my_categories'), 'url' => null],
        ];

        return view('admin.category.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData['breadcrumbs'] = [
            ['label' => __('admin.admin'), 'url' => route('admin.index')],
            ['label' => __('category.my_categories'), 'url' => route('admin.category.index')],
            ['label' => __('product.create_product'), 'url' => null],
        ];

        return view('admin.category.create')->with('viewData', $viewData);
    }

    public function store(Request $request): RedirectResponse
    {
        Category::validate($request);
        $newCategory = new Category;
        $newCategory->setName($request->input('name'));
        $newCategory->setDescription($request->input('description'));
        $newCategory->save();

        Session::flash('success', __('category.create_success'));

        return back();
    }

    public function edit(int $id): View
    {
        $viewData = [];
        $category = Category::findOrFail($id);
        $viewData['category'] = $category;
        $viewData['breadcrumbs'] = [
            ['label' => __('admin.admin'), 'url' => route('admin.index')],
            ['label' => __('category.my_categories'), 'url' => route('admin.category.index')],
            ['label' => $category->getName(), 'url' => route('admin.category.show', $id)],
            ['label' => __('category.edit_category'), 'url' => null],
        ];

        return view('admin.category.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        Category::validate($request);
        $category = Category::findOrFail($id);
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));
        $category->save();

        Session::flash('success', __('category.update_success'));

        return redirect()->route('admin.category.index');
    }

    public function delete(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', __('category.delete_success'));

        return redirect()->route('admin.category.index');
    }
}
