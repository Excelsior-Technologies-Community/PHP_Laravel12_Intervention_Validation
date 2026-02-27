<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Resource routes for users
Route::resource('users', UserController::class);

// Additional search route
Route::get('/users/search', [UserController::class, 'search'])->name('users.search');