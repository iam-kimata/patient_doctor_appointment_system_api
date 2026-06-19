<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// for users to login
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // for create users
    Route::post('register', [AdminController::class, 'createUser']);

    // for displaying users
    Route::get('users', [AuthController::class, 'users']);

});

