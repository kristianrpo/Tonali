<?php

use Illuminate\Support\Facades\Route;

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.index');
});
