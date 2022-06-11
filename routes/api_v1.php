<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\NoteController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Auth
Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    // Token
    Route::prefix('/token')->group(function () {
        Route::get('/check', [AuthController::class, 'checkToken']);

        Route::middleware(['auth:sanctum'])->group(function () {
            // Route::get('/refresh', [AuthController::class, 'refreshToken']);
        });
    });
});

// User
Route::prefix('/user')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/', [UserController::class, 'detail']);
    });
});

// Note
Route::prefix('/notes')->group(function () {
    Route::get('/private', [NoteController::class, 'getPrivateNotes']);
    Route::get('/public', [NoteController::class, 'getPublicNotes']);

    Route::middleware(['auth:sanctum'])->group(function () {
        Route::post('/create', [NoteController::class, 'store']);
    });
});
