<?php

use Illuminate\Support\Facades\Route;

Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('order.createFromCart');
});
