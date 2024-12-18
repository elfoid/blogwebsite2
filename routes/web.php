<?php
use Illuminate\Support\Facades\View;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::resource('posts', PostController::class);
Route::prefix('posts/{post}')->group(function () { // Nested routes for comments
    Route::resource('comments', CommentController::class)->except(['create', 'edit','update','destroy']); // Only store and index are usually needed
});
//Route::resources('posts.comments', CommentController::class);

/*
Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', function() {
    return view('welcome');
}); 
*/