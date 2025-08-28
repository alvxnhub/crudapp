<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', function () {

    $posts = [];

    if (auth()->check()) {
        $posts = auth()->user()->posts()->latest()->get();
    }
    return view('index', ['posts' => $posts]);
});

Route::post('/register', [UserController::class, 'register']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/login', [UserController::class, 'login']);

Route::post('/create-posts', [PostController::class, 'createPost']);

Route::get('/edit-post/{post}', [PostController::class, 'editPost']);

Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);

Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);

Route::get('/signup', [UserController::class, 'showSignupForm']);

Route::get('/signin', [UserController::class, 'showSigninForm']);