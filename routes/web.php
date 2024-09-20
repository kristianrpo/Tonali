<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

include __DIR__.'/admin/routes.php';
include __DIR__.'/product/routes.php';
include __DIR__.'/cart/routes.php';
include __DIR__.'/review/routes.php';
