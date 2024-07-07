<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DatasetController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [AuthenticationController::class, 'getUser']);

    Route::get('/datasets/regression', [DatasetController::class, 'regression']);
    Route::apiResource('/datasets', DatasetController::class)->except('show');
});

Route::post('/login', [AuthenticationController::class, 'login']);
