<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminController@index')->name('admin.index');
    Route::delete('/admin/delete', 'App\Http\Controllers\Admin\AdminController@delete')->name('admin.delete');
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::get('/admin/products/search', 'App\Http\Controllers\Admin\AdminProductController@search')->name('admin.product.search');
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::get('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@show')->name('admin.product.show');
    Route::get('/admin/products/edit/{id}', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/update/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
    Route::delete('/admin/products/delete/{id}', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
    Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name('admin.category.index');
    Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\AdminCategoryController@create')->name('admin.category.create');
    Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name('admin.category.store');
    Route::get('/admin/categories/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@show')->name('admin.category.show');
    Route::get('/admin/categories/edit/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name('admin.category.edit');
    Route::put('/admin/categories/update/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.category.update');
    Route::delete('/admin/categories/delete/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name('admin.category.delete');
});
