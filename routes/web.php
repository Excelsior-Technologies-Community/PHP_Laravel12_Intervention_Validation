<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('users.index');
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::get(
    '/users',
    [UserController::class, 'index']
)->name('users.index');

Route::get(
    '/users/create',
    [UserController::class, 'create']
)->name('users.create');

Route::post(
    '/users',
    [UserController::class, 'store']
)->name('users.store');

Route::get(
    '/users/{user}',
    [UserController::class, 'show']
)->name('users.show');

Route::delete(
    '/users/{user}',
    [UserController::class, 'destroy']
)->name('users.destroy');
