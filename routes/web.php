<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
    Route::get('/blog/post', [BlogPostController::class, 'create'])->name('post_blog');
    Route::post('/blog', [BlogPostController::class, 'store'])->name('store_blog');
    Route::get('blog/{id}', [BlogPostController::class, 'show'])->name('show_blog');
});
