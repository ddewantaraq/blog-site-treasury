<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Blog\ViewController;

Route::get('/', [ViewController::class, 'all'])->name('home');
Route::get('/detail/{blogId}', [ViewController::class, 'detail'])->name('blog.detail');

require __DIR__.'/auth.php';
require __DIR__.'/blog.php';
