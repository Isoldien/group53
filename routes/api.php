<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Public routes (no authentication required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Authentication endpoints
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
    
    // User profile endpoints
    Route::get('/profile', [UserController::class, 'profile']);
    Route::put('/profile', [UserController::class, 'updateProfile']);
});

// Test endpoint (keep for database connection testing)
Route::get('/test', function(Request $request) {
    return "hello";
});
Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/basket/add', [BasketController::class, 'addProduct']);
    Route::post('/basket/increase', [BasketController::class, 'increaseQuantity']);
    Route::post('/basket/decrease', [BasketController::class, 'decreaseQuantity']);
});