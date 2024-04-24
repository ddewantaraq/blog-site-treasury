<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::middleware('guest')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::get('/register', [RegisterController::class, 'show'])->name('register');
    
        Route::post('/register', [RegisterController::class, 'submit']);
    
        Route::get('/login', [LoginController::class, 'show'])->name('login');
    
        Route::post('/login', [LoginController::class, 'submit']);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');
});