<?php

use Illuminate\Support\Facades\Route;

Route::get('/reviews/create/{id}', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/reviews/store/{id}', 'App\Http\Controllers\ReviewController@store')->name('review.store');
Route::get('/reviews/edit/{id}', 'App\Http\Controllers\ReviewController@edit')->name('review.edit');
Route::put('/reviews/update/{id}', 'App\Http\Controllers\ReviewController@update')->name('review.update');
Route::delete('/reviews/delete/{id}', 'App\Http\Controllers\ReviewController@delete')->name('review.delete');
