<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

include __DIR__.'/admin/routes.php';
include __DIR__.'/product/routes.php';
include __DIR__.'/cart/routes.php';
include __DIR__.'/review/routes.php';

Route::get('/reviews/report/{id}', 'App\Http\Controllers\ReviewController@report')->name('review.report');
Route::post('/reviews/report/validate/{id}', 'App\Http\Controllers\ReviewController@validateReport')->name('review.validateReport');
