<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\creditoController;
use App\Http\Controllers\listaMaestraController;
use App\Http\Controllers\opcionListaMaestraController;
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
Route::post('/login', [authController::class, 'login']);
Route::get('/listaMaestra/{lista_maestra_id}/opciones', [opcionListaMaestraController::class, 'index']);
Route::post('/registrarme', [usuariosController::class, 'registrarme']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/roles', [rolesController::class, 'index']);
    Route::get('/roles/{id}', [rolesController::class, 'show']);
    Route::post('/roles', [rolesController::class, 'store']);

    Route::get('/usuarios', [usuariosController::class, 'index']);
    Route::get('/usuarios/{id}', [usuariosController::class, 'show']);
    Route::post('/usuarios', [usuariosController::class, 'store']);
    Route::patch('/usuarios/{id}', [usuariosController::class, 'update']);
    Route::patch('/usuarios/{id}/activo', [usuariosController::class, 'cambiarActivo']);

    Route::get('/listaMaestra', [listaMaestraController::class, 'index']);
    Route::get('/listaMaestra/{id}', [listaMaestraController::class, 'show']);
    Route::get('/listaMaestra/nombre/{nombre}', [listaMaestraController::class, 'obtenerListaPorNombre']);
    Route::post('/listaMaestra', [listaMaestraController::class, 'store']);

    
    Route::get('/opcionListaMaestra/{id}', [opcionListaMaestraController::class, 'show']);
    Route::post('/opcionListaMaestra', [opcionListaMaestraController::class, 'store']);
    Route::get('/creditos', [creditoController::class, 'index']);
    Route::get('/creditos/{id}', [creditoController::class, 'show']);
    Route::post('/creditos', [creditoController::class, 'store']);

    Route::get('/solicitudCredito', [solicitudCreditoController::class, 'index']);
    Route::get('/solicitudCredito/{id}', [solicitudCreditoController::class, 'show']);
    Route::post('/solicitudCredito', [solicitudCreditoController::class, 'store']);
    Route::patch('/solicitudCredito/{id}', [solicitudCreditoController::class, 'update']);
    Route::patch('/solicitudCredito/{id}/estado', [solicitudCreditoController::class, 'cambiarEstado']);

    Route::get('/tipoCredito', [tipoCreditoController::class, 'index']);
    Route::get('/tipoCredito/{id}', [tipoCreditoController::class, 'show']);
    Route::post('/tipoCredito', [tipoCreditoController::class, 'store']);
});