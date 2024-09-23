<?php

use Illuminate\Support\Facades\Route;

Route::get('/profile', 'App\Http\Controllers\UserController@index')->name('profile.index');
Route::get('/profile/edit', 'App\Http\Controllers\UserController@edit')->name('profile.edit');
Route::put('/profile/update', 'App\Http\Controllers\UserController@update')->name('profile.update');
Route::delete('/profile/delete', 'App\Http\Controllers\UserController@delete')->name('profile.delete');
