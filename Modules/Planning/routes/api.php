<?php

use Illuminate\Support\Facades\Route;
use Modules\Lab\Http\Controllers\LabController;
use Modules\Planning\Http\Controllers\MoController;
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

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('planning', PlanningController::class)->names('planning');
});

Route::get('mos', [LabController::class, 'index']);