<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Auth
Route::post('/login', [AuthController::class, 'login']);
Route::post('/create-account', [AuthController::class, 'createAccount']);

// Note
Route::prefix('/notes')->group(function () {
    Route::get('/', [NoteController::class, 'index']);
});
