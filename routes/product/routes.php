<?php

use Illuminate\Support\Facades\Route;

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/suggest', 'App\Http\Controllers\ProductController@suggest')->name('product.suggest');
Route::get('/products/recommended', 'App\Http\Controllers\ProductController@recommended')->name('product.recommended');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
