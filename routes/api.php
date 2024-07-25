<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoiController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\DatasetController;
use App\Http\Controllers\DataujiController;
use App\Http\Controllers\RoishopController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\AuthenticationController;

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

    Route::controller(ShopController::class)->group(function () {
        Route::get('/shops/roi/{shop:slug}', 'getroishops');
        Route::apiResource('/shops', ShopController::class);
    });

    Route::controller(RoishopController::class)->group(function () {
        Route::get('/roishops/average', 'getroiaverage');
        Route::apiResource('/roishops', RoishopController::class);
    });

    Route::controller(ConsumerController::class)->group(function () {
        Route::get('/consumers/analysis', 'analysis');
        Route::get('/consumers', 'index');
        Route::get('/consumers/{consumer}', 'show');
        Route::delete('/consumers/{consumer}', 'destroy');
    });
});

Route::post('/login', [AuthenticationController::class, 'login']);

Route::apiResource('/consumers', ConsumerController::class)->except(['index', 'show', 'destroy', 'update']);
