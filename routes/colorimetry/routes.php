<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/colorimetry', 'App\Http\Controllers\ColorimetryController@index')->name('colorimetry.index');
    Route::post('/colorimetry/save', 'App\Http\Controllers\ColorimetryController@store')->name('colorimetry.store');
    Route::get('/colorimetry/create', 'App\Http\Controllers\ColorimetryController@create')->name('colorimetry.create');
    Route::get('/colorimetry/edit/{id}', 'App\Http\Controllers\ColorimetryController@edit')->name('colorimetry.edit');
    Route::put('/colorimetry/update/{id}', 'App\Http\Controllers\ColorimetryController@update')->name('colorimetry.update');
    Route::delete('/colorimetry/delete/{id}', 'App\Http\Controllers\ColorimetryController@delete')->name('colorimetry.delete');
});
