<?php

use App\Http\Controllers\MedicineController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::prefix('remedios')->group(function() {

        Route::get('/', [MedicineController::class, "index"])->name('medicine.index');
        Route::get('/criar', [MedicineController::class, "create"])->name('medicine.create');
        Route::get('/{id}/editar', [MedicineController::class, "edit"])->name('medicine.edit');
        Route::post('/', [MedicineController::class, "insert"])->name('medicine.insert');
        Route::put('/', [MedicineController::class, "update"])->name('medicine.update');
        Route::delete('/', [MedicineController::class, "delete"])->name('medicine.delete');

    });

});
