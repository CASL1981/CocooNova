<?php

use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'profile.profile')->name('profile.show');
    Route::view('/users', 'users.index')->name('user.index')->middleware('canView:user');
    Route::view('/roles', 'roles.index')->name('role.index')->middleware('canView:role');
    Route::view('/setting/general', 'setting.general.index')->name('setting.general');
    Route::view('/setting/costcenter', 'setting.costcenter.index')->name('setting.costcenter');
    Route::view('/setting/characteristics', 'setting.characteristics.index')->name('setting.characteristics');

    // Notificaciones
    Route::get('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');

});
