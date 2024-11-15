<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->put('/cart/update', 'App\Http\Controllers\Api\CartApiController@update')->name('api.cart.update');
