<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\ViewController;
use App\Http\Controllers\Blog\CreateController;
use App\Http\Controllers\Blog\DeleteController;
use App\Http\Controllers\Blog\UpdateController;

Route::middleware('auth')->group(function () {
    Route::prefix('blog')->group(function () {
        Route::get('/', [ViewController::class, 'show'])->name('blog.view');

        // create
        Route::get('/create', [CreateController::class, 'show'])->name('blog.create.view');
        Route::post('/create', [CreateController::class, 'submit'])->name('blog.create.submit');

        // delete
        Route::delete('/delete/{blog}', [DeleteController::class, 'destroy'])->name('blog.delete');

        // update
        Route::get('/update/{blog}', [UpdateController::class, 'show'])->name('blog.update.view');
        Route::put('/update/{blog}', [UpdateController::class, 'submit'])->name('blog.update.submit');
    });
});