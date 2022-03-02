<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('api/vehicles')->group(function () {
    Route::get('/', [\App\Http\Controllers\VehiclesController::class, 'getVehicles']);
    Route::get('/{id}/inventory', [\App\Http\Controllers\VehiclesController::class, 'getVehicle']);
    Route::post('/{id}/inventory', [\App\Http\Controllers\VehicleInventoryController::class, 'store']);
    Route::put('/{id}/inventory', [\App\Http\Controllers\VehicleInventoryController::class, 'update']);
    Route::put('/{id}/inventory/increase', [\App\Http\Controllers\VehicleInventoryController::class, 'increase']);
    Route::put('/{id}/inventory/decrease', [\App\Http\Controllers\VehicleInventoryController::class, 'decrease']);
});

Route::prefix('api/starships')->group(function () {
    Route::get('/', [\App\Http\Controllers\StarshipsController::class, 'getStarships']);
    Route::get('/{id}/inventory', [\App\Http\Controllers\StarshipsController::class, 'getStarship']);
    Route::post('/{id}/inventory', [\App\Http\Controllers\StarshipInventoryController::class, 'store']);
    Route::put('/{id}/inventory', [\App\Http\Controllers\StarshipInventoryController::class, 'update']);
    Route::put('/{id}/inventory/increase', [\App\Http\Controllers\StarshipInventoryController::class, 'increase']);
    Route::put('/{id}/inventory/decrease', [\App\Http\Controllers\StarshipInventoryController::class, 'decrease']);
});




