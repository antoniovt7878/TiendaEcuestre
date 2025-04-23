<?php

use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CarritosController;
use App\Http\Controllers\VentasController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::post('tienda', [TiendaController::class, 'index'])-> name('tiendaFromLogin');

Route::get('tienda', [TiendaController::class, 'index'])-> name('tienda.index');

Route::get('/carrito/agregar/{id}', [CarritosController::class, 'agregarProductoAlCarrito'])->name('carrito.agregar');
Route::get('/carrito/eliminar/{id}', [CarritosController::class, 'eliminarProductoDelCarrito'])->name('carrito.eliminar');
Route::get('/carrito/terminar', [CarritosController::class, 'terminarCarrito'])->name('carrito.terminar');

Route::get('carrito', [CarritosController::class, 'index'])->name('verCarrito');

Route::get('pedidos', [VentasController::class, 'index'])->name('verVentas');

Route::get('/pedidos/consultar/{id}', [VentasController::class, 'consultar'])->name('venta.consultar');
