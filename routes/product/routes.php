<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
