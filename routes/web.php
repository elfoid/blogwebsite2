<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['web'])->group(function () {
    // Authentication routes
    Auth::routes();

    // Posts routes with auth middleware
    Route::resource('posts', PostController::class);

    // Comments routes with auth middleware
    Route::prefix('posts/{post_id}')->middleware('auth')->group(function () {
        Route::resource('comments', CommentController::class)->except(['destroy']);
    });

    // Home route
    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
