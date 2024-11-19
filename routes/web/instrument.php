<?php

use App\Http\Controllers\InstrumentController;

Route::get('/instruments', [InstrumentController::class, 'index'])->name('instrument.index');
Route::get('/instruments/{id}', [InstrumentController::class, 'show'])->name('instrument.show');
