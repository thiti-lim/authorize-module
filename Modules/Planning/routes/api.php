<?php

use Illuminate\Support\Facades\Route;
use Modules\Planning\Http\Controllers\MoveStockController;
use Modules\Planning\Http\Controllers\PlanningController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
 */

Route::middleware(['auth:sanctum'])->prefix('planning')->group(function () {
    Route::apiResource('move-stock', MoveStockController::class);
});
