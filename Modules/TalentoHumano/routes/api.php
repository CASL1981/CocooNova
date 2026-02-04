<?php

use Illuminate\Support\Facades\Route;

// use Modules\TalentoHumano\App\Http\Controllers\TalentoHumanoController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    // Route::apiResource('talentohumanos', TalentoHumanoController::class)->names('talentohumano');
});
