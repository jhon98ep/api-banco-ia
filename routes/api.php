<?php

use App\Http\Controllers\creditoController;
use App\Http\Controllers\listaMaestraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\rolesController;
use App\Http\Controllers\solicitudCreditoController;
use App\Http\Controllers\tipoCreditoController;
use App\Http\Controllers\usuariosController;
use App\Models\opcionListaMaestra;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('roles', rolesController::class);
Route::apiResource('usuarios', usuariosController::class);
Route::apiResource('listaMaestra', listaMaestraController::class);
Route::apiResource('opcionesListaMaestra', opcionListaMaestra::class);
Route::apiResource('creditos', creditoController::class);
Route::apiResource('solicitudCredito', solicitudCreditoController::class);
Route::apiResource('tipoCredito', tipoCreditoController::class);