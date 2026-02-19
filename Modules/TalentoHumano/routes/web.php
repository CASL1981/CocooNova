<?php

use Illuminate\Support\Facades\Route;
use Modules\TalentoHumano\App\Http\Controllers\EmployeeController;
use Modules\TalentoHumano\App\Http\Controllers\TalentoHumanoController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('talentohumano', [TalentoHumanoController::class, 'index'])->name('talentohumano');

    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index')->middleware('canView:employee');

    // ruta para adicionar información personal y educación del empleado
    Route::get('manage-profile', [EmployeeController::class, 'manageProfile'])->name('talentohumano.manage-profile');
    // ->middleware('canView:manage-profile');
});
