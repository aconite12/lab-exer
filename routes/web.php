<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('index');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
Route::get('/blog/post', [BlogPostController::class, 'create'])->name('post_blog');
Route::post('/blog', [BlogPostController::class, 'store'])->name('blog');
Route::get('blog/{id}', [BlogPostController::class, 'show'])->name('show_blog');
