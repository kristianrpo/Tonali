<?php

use Illuminate\Support\Facades\Route;

Route::get('/products/suggest', 'App\Http\Controllers\Api\ProductApiController@suggest')->name('api.product.suggest');
Route::get('/products/paginate', 'App\Http\Controllers\Api\ProductApiController@paginate')->name('api.product.paginate');
Route::get('/products/{id}', 'App\Http\Controllers\Api\ProductApiController@show')->name('api.product.show');
Route::get('/products', 'App\Http\Controllers\Api\ProductApiController@index')->name('api.product');
