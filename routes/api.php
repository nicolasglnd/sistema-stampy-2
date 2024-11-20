<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//tablas endpoints

use App\Http\Controllers\Api\V1\ClientesController;
use App\Http\Controllers\Api\V1\CostosFinalesController;
use App\Http\Controllers\Api\V1\DashboardController;
use App\Http\Controllers\Api\V1\EmpleadosController;
use App\Http\Controllers\Api\V1\FacturasElectronicasController;
use App\Http\Controllers\Api\V1\InventarioController;
use App\Http\Controllers\Api\V1\OrdenesTrabajoController;
use App\Http\Controllers\Api\V1\PantallasSerigraficasController;
use App\Http\Controllers\Api\V1\PersonasController;
use App\Http\Controllers\Api\V1\TrabajosController;
use App\Http\Controllers\Api\V1\UsuariosController;


Route::resource('/v1/clientes', ClientesController::class);
Route::resource('/v1/costosFinales', CostosFinalesController::class);
Route::resource('/v1/dashboard', DashboardController::class);
Route::resource('/v1/empleados', EmpleadosController::class);
Route::resource('/v1/facturasElectronicas', FacturasElectronicasController::class);
Route::resource('/v1/inventario', InventarioController::class);
Route::resource('/v1/ordenesDeTrabajo', OrdenesTrabajoController::class);
Route::resource('/v1/pantallasSerigraficas', PantallasSerigraficasController::class);
Route::resource('/v1/personas', PersonasController::class);
Route::resource('/v1/trabajos', TrabajosController::class);
Route::resource('/v1/usuarios', UsuariosController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
