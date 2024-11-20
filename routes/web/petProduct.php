<?php

use App\Http\Controllers\PetProductController;

Route::get('/pet-products', [PetProductController::class, 'index'])->name('petProduct.index');
Route::get('/pet-products/{id}', [PetProductController::class, 'show'])->name('petProduct.show');
