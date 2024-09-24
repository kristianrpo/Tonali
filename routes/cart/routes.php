<?php

use Illuminate\Support\Facades\Route;

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::put('/cart/update', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::delete('/cart/delete', 'App\Http\Controllers\CartController@delete')->name('cart.delete');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
