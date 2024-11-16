<?php

use Illuminate\Support\Facades\Route;

Route::get('/products/suggest', 'App\Http\Controllers\Api\ProductApiController@suggest')->name('api.product.suggest');
Route::get('/products', 'App\Http\Controllers\Api\ProductApiController@index')->name('api.product.index');
Route::get('/products/paginate', 'App\Http\Controllers\Api\ProductApiController@paginate')->name('api.product.paginate');
