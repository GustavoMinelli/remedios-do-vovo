<?php

use Illuminate\Support\Facades\Route;

Route::prefix('pacientes')->group(function() {

    Route::get('/', 'PacientController@index')->name('pacient.index');
    Route::get('/novo', 'PacientController@create')->name('pacient.create');
    Route::post('/novo', 'PacientController@store')->name('pacient.store');
    Route::get('/{pacient}', 'PacientController@show')->name('pacient.show');
    Route::get('/{pacient}/editar', 'PacientController@edit')->name('pacient.edit');
    Route::put('/{pacient}', 'PacientController@update')->name('pacient.update');
    Route::delete('/{pacient}', 'PacientController@destroy')->name('pacient.destroy');
    
});