<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ContratosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
*/
/*
Route::prefix('v1')->group(function () {
    Route::apiResource('clientes', ClientesController::class);
    Route::apiResource('contratos', ContratosController::class);
});
*/

Route::prefix('v1')->group(function () {
    // Rutas públicas
    Route::apiResource('clientes', ClientesController::class)->only(['index', 'show']);
    Route::apiResource('contratos', ContratosController::class)->only(['index', 'show']);
    // Rutas protegidas
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('clientes', ClientesController::class)->except(['index', 'show']);
        Route::apiResource('contratos', ContratosController::class)->except(['index', 'show']);
    });
});
