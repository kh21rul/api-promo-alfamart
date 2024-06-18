<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [AuthenticationController::class, 'user']);
});

Route::post('/login', [AuthenticationController::class, 'login']);
