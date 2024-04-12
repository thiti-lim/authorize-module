<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('auth/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::get('auth/modules/', [AuthController::class, 'modules'])->middleware('auth:sanctum');
Route::get('auth/modules/{module}', [AuthController::class, 'module'])->middleware('auth:sanctum');