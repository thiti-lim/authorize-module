<?php

use Illuminate\Support\Facades\Route;
use Modules\StockManagement\Http\Controllers\StockController;
use Modules\StockManagement\Http\Controllers\StockManagementController;

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

Route::middleware(['auth:sanctum'])->prefix('stock-management')->group(function () {

    Route::prefix('stocks')->group(function () {
        Route::get('/', [StockController::class, 'index']);
        Route::post('/', [StockController::class, 'store']);
        Route::post('/{stock}', [StockController::class, 'show']);
        Route::post('/{stock}', [StockController::class, 'delete']);
    });

});
