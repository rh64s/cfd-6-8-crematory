<?php

use App\Http\Controllers\DeceasedController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ServiceController;

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendCode']);
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset']);
});

Route::apiResource('/services', ServiceController::class, ['only' => ['index', 'show']]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [ProfileController::class, 'me']);
    Route::get('/profile/{id}', [ProfileController::class, 'show']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::post('/change-password', [ProfileController::class, 'changePassword']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);

    Route::post('/auth/logout', [AuthController::class, 'logout']);

    Route::post('/services', [ServiceController::class, 'store']);
    Route::patch('/services/{id}', [ServiceController::class, 'update']);
    Route::delete('/services/{id}', [ServiceController::class, 'destroy']);

    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/{order}', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::delete('/orders', [OrderController::class, 'destroy']);
    Route::patch('/orders/{order}', [OrderController::class, 'update']);

    Route::post('/deceaseds', [DeceasedController::class, 'store']);
});

Route::middleware([App\Http\Middleware\AdminMiddleware::class])->group(function () {
    Route::get('/users', [ProfileController::class, 'list']);
});


