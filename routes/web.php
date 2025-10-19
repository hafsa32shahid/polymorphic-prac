<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resources([
    'users' => UserController::class,
    'posts' => PostController::class,
]);