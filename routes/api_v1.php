<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\NoteController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::prefix('/auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// User
Route::prefix('/user')->group(function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::get('/detail', [UserController::class, 'detail']);
    });
    Route::post('/create', [UserController::class, 'store']);
});

// Note
Route::prefix('/notes')->group(function () {
    Route::get('/', [NoteController::class, 'index']);
});
