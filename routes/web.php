<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('admin')->group(function () {
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
Route::post('/admin/products/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name('admin.product.save');
Route::get('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@show')->name('admin.product.show');
Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
// });

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name('product.search');
