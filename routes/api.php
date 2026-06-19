<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

// for users to login
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // for displaying dashboard information
    Route::get('dashboard', [AdminController::class, 'dashboardInformation']);

    // for cancel appointment
    Route::put('appointments/{appointment}', [AdminController::class, 'cancelAppointment']);

    // for delete appointment
    Route::delete('appointments/{appointment}', [AdminController::class, 'destroyAppointment']);

    // for displaying users
    Route::get('users', [AuthController::class, 'users']);

    // for create users
    Route::post('register', [AdminController::class, 'createUser']);

});

