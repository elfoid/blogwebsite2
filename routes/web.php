<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::resource('posts', PostController::class);

Route::prefix('posts/{post_id}')->group(function () {
    Route::resource('comments', CommentController::class)->except(['destroy']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
