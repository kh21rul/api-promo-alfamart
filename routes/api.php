<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DataujiController;
use App\Http\Controllers\AuthenticationController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [AuthenticationController::class, 'logout']);
    Route::get('/user', [AuthenticationController::class, 'getUser']);

    Route::post('/datasets/storefile', [DatasetController::class, 'storefile']);
    Route::get('/datasets/regression', [DatasetController::class, 'regression']);
    Route::delete('/datasets/destroyall', [DatasetController::class, 'destroyAll']);
    Route::apiResource('/datasets', DatasetController::class)->except('show');

    Route::apiResource('/dataujis', DataujiController::class);
});

Route::post('/login', [AuthenticationController::class, 'login']);
