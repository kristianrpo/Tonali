<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
    Route::get('/products/search', 'App\Http\Controllers\ProductController@search')->name('product.search');
    Route::get('/products/recommended', 'App\Http\Controllers\ProductController@recommended')->name('product.recommended');
    Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
});