<?php

use Illuminate\Support\Facades\Route;
use Modules\TalentoHumano\App\Http\Controllers\EmployeeController;
use Modules\TalentoHumano\App\Http\Controllers\TalentoHumanoController;
use Modules\TalentoHumano\App\Http\Controllers\ContractController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('talentohumano', [TalentoHumanoController::class, 'index'])->name('talentohumano');

    Route::get('employee', [EmployeeController::class, 'index'])->name('employee.index')->middleware('canView:employee');
    Route::get('contract', [ContractController::class, 'index'])->name('contract.index')->middleware('canView:contracts');

    // ruta para adicionar información personal y educación del empleado
    Route::get('manage-profile', [EmployeeController::class, 'manageProfile'])->name('talentohumano.manage-profile')
    ->middleware('canView:manage-profile');

    // ruta para adicionar información personal y educación del empleado
    Route::get('manage-contract', [ContractController::class, 'manageContract'])->name('talentohumano.manage-contract')
    ->middleware('canView:contracts');

    Route::get('contract/{contract}/pdf', [ContractController::class, 'showContract'])->name('contract.pdf');
});
