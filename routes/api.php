<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('auth/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
Route::get('auth/user/role', [AuthController::class, 'role'])->middleware('auth:sanctum');

Route::controller(RoleController::class)->prefix('/roles')->group(function () {
    Route::get('/', 'index');
});