<?php

use App\Http\Controllers\Api\Employee\PostController;
use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Support\Facades\Route;

Route::middleware(['guest:employee'])->prefix('auth')->as('auth.')->group(function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::middleware('auth:employee')->group(function () {
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('/refresh', [AuthenticationController::class, 'refresh'])->withoutMiddleware('auth:employee');

    //  api post
    Route::apiResource('job-employ', PostController::class);
});