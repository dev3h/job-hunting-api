<?php

use App\Http\Controllers\Api\Employee\PostController;
use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:admin'])->prefix('auth')->as('auth.')->group(function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/me', action: [AuthenticationController::class, 'me']);
    Route::post('/refresh', [AuthenticationController::class, 'refresh'])->withoutMiddleware('auth:admin');

    Route::apiResource('job-employ', PostController::class);
});