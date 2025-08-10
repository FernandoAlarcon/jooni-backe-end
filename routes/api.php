<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {

    Route::get('/test', function () {
        return response()->json(['message' => 'API works!']);
    });

    //Route::middleware(['auth.api'])->prefix('v1')->group(function () {
        Route::prefix('v1')->group(function () {
            Route::get('/locations', [LocationController::class, 'index']);
            Route::post('/locations', [LocationController::class, 'store']);
        });
    //});

});
