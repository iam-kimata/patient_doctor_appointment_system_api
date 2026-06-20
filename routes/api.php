<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Doctor\DoctorController;
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

    // for fetch dropdown data
    Route::get('create', [AdminController::class, 'create']);

    // for create appointment
    Route::post('store', [AuthController::class, 'store']);

    // for displaying users
    Route::get('users', [AuthController::class, 'users']);

    // for create users
    Route::post('register', [AdminController::class, 'createUser']);

    // for displaying dashboard information
    Route::get('dashboard', [DoctorController::class, 'dashboardInformation']);

    // for logout
    Route::post('logout', [AdminController::class, 'logout']);

});

