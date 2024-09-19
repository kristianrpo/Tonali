<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware('admin')->group(function () {
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
Route::get('/admin/products/search', 'App\Http\Controllers\Admin\AdminProductController@search')->name('admin.product.search');
Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
Route::get('/admin/products/{id}', 'App\Http\Controllers\Admin\AdminProductController@show')->name('admin.product.show');
Route::get('/admin/products/edit/{id}', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
Route::put('/admin/products/update/{id}', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
Route::delete('/admin/products/delete/{id}', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
// });

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name('product.search');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::delete('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::get('/reviews/create/{id}', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/reviews/store/{id}', 'App\Http\Controllers\ReviewController@store')->name('review.store');
Route::get('/reviews/edit/{id}', 'App\Http\Controllers\ReviewController@edit')->name('review.edit');
Route::put('/reviews/update/{id}', 'App\Http\Controllers\ReviewController@update')->name('review.update');
Route::delete('/reviews/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name('review.delete');
