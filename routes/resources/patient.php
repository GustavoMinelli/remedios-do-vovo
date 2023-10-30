<?php

use App\Http\Controllers\PatientController;
use Illuminate\Support\Facades\Route;

Route::prefix('pacientes')->group(function() {

    Route::get('/', [PatientController::class, "index"])->name('patient.index');
    Route::get('/criar', [PatientController::class, "create"])->name('patient.create');
    Route::get('/{id}/editar', [PatientController::class, "edit"])->name('patient.edit');
    Route::post('/', [PatientController::class, "insert"])->name('patient.insert');
    Route::post('/', [PatientController::class, "update"])->name('patient.update');
});