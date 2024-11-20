<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdenTrabajoController;


Route::view('/','welcome')->name('home');

Route::resource('/inventario', InventarioController::class)->middleware('auth');
Route::resource('/empleados', EmpleadoController::class)->middleware('auth');
Route::resource('/clientes', ClienteController::class)->middleware('auth');
Route::resource('/ordenestrabajos', OrdenTrabajoController::class)->middleware('auth');
Route::get('ordenestrabajos/{id}/trabajos', [OrdenTrabajoController::class, 'trabajos'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
