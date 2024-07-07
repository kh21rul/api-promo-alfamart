<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DatasetController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [AuthenticationController::class, 'getUser']);

    Route::post('/datasets/storefile', [DatasetController::class, 'storefile']);
    Route::get('/datasets/regression', [DatasetController::class, 'regression']);
    Route::delete('/datasets/destroyall', [DatasetController::class, 'destroyAll']);
    Route::apiResource('/datasets', DatasetController::class)->except('show');
});

Route::post('/login', [AuthenticationController::class, 'login']);
