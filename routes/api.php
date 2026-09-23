<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Doctor\DoctorController;
use Illuminate\Support\Facades\Route;

// for register users
Route::post('register', [AuthController::class, 'register']);

// for users to login
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    // for displaying dashboard information
    Route::get('dashboard', [AdminController::class, 'dashboard']);

    // for cancel appointment
    Route::put('appointments/{appointment}', [AdminController::class, 'cancelAppointment']);

    // for delete appointment
    Route::delete('appointments/{appointment}', [AdminController::class, 'destroyAppointment']);

    // for fetch dropdown data
    Route::get('create', [AdminController::class, 'create']);

    // for create appointment
    Route::post('store', [AdminController::class, 'store']);

    // for displaying users
    Route::get('users', [AdminController::class, 'users']);

    // // for displaying dashboard information
    // Route::get('dashboard', [DoctorController::class, 'dashboardInformation']);

    // for logout
    Route::post('logout', [AdminController::class, 'logout']);

});

