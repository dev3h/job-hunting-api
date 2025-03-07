<?php

use App\Http\Controllers\Auth\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::middleware(['guest'])->prefix('auth')->as('auth.')->group(function () {
    Route::post('/login', [AuthenticationController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/me', [AuthenticationController::class, 'me']);
    Route::post('refresh', [AuthenticationController::class, 'refresh'])->withoutMiddleware('auth');
});
