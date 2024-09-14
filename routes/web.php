<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('admin')->group(function () {
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
Route::post('/admin/products/save', 'App\Http\Controllers\Admin\AdminProductController@save')->name('admin.product.save');
// });
