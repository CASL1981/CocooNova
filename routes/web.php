<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/dashboard', 'dashboard')->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('/profile', 'profile.profile')->name('profile.show');
    Route::view('/users', 'users.index')->name('user.index');
    Route::view('/roles', 'roles.index')->name('role.index')->middleware('canView:role');
});