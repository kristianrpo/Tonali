<?php

use Illuminate\Support\Facades\Route;

Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');

Route::middleware('auth')->group(function () {
    Route::post('/orders/place', 'App\Http\Controllers\OrderController@place')->name('order.place');
});
