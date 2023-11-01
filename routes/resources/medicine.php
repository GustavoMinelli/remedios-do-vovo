<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::prefix('medicamentos')->group(function() {
        Route::get('/', [App\Http\Controllers\MedicineController::class, "index"])->name('medicine.index');
    });
});