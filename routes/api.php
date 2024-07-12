<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DataujiController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\RoiController;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/logout', 'logout');
        Route::get('/user', 'getUser');
    });

    Route::controller(DatasetController::class)->group(function () {
        Route::post('/datasets/storefile', 'storefile');
        Route::get('/datasets/regression', 'regression');
        Route::delete('/datasets/destroyall', 'destroyAll');
        Route::apiResource('/datasets', DatasetController::class);
    });

    Route::controller(DataujiController::class)->group(function () {
        Route::apiResource('/dataujis', DataujiController::class);
    });

    Route::controller(RoiController::class)->group(function () {
        Route::apiResource('/rois', RoiController::class);
    });
});

Route::post('/login', [AuthenticationController::class, 'login']);
