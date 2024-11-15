<?php

use Illuminate\Support\Facades\Route;

Route::get('/products/suggest', 'App\Http\Controllers\Api\ProductApiController@suggest')->name('api.product.suggest');
