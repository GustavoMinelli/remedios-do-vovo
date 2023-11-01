<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::prefix('pacientes')->group(function() {

        Route::get('/', [PatientController::class, "index"])->name('patient.index');
        Route::get('/criar', [PatientController::class, "create"])->name('patient.create');
        Route::get('/{patient}/editar', [PatientController::class, "edit"])->name('patient.edit');
        Route::post('/', [PatientController::class, "insert"])->name('patient.insert');
        Route::patch('/{patient}', [PatientController::class, "update"])->name('patient.update');
        Route::delete('/{patient}', [PatientController::class, "delete"])->name('patient.delete');
    
    });

}); 