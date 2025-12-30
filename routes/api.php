<?php

use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\LapTimeController;
use App\Http\Controllers\Api\RaceSessionController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/drivers', [DriverController::class, 'index']);
    Route::get('/drivers/{driver_number}', [DriverController::class, 'show']);

    Route::get('/sessions', [RaceSessionController::class, 'index']);
    Route::get('/sessions/{session_key}', [RaceSessionController::class, 'show']);

    Route::get('/lap-times', [LapTimeController::class, 'index']);
    Route::get('/lap-times/{session_key}', [LapTimeController::class, 'show']);
});