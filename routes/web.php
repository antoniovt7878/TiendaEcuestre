<?php

use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CarritosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\DeseosController;
use App\Http\Controllers\DireccionesController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProductosController;
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
Route::post('/carrito/terminar', [CarritosController::class, 'terminarCarrito'])->name('carrito.terminar');

Route::get('carrito', [CarritosController::class, 'index'])->name('verCarrito');

Route::get('pedidos', [VentasController::class, 'index'])->name('verVentas');

Route::get('/pedidos/consultar/{id}', [VentasController::class, 'consultar'])->name('venta.consultar');
Route::get('/pedidos/modificar/{id}', [VentasController::class, 'modificar'])->name('venta.modificar');

Route::post('productos', [ProductosController::class, 'crear'])->name('producto.crear');
Route::post('productos/guardar/{id}', [ProductosController::class, 'guardar'])->name('producto.guardar');
Route::delete('productos/eliminar/{id}', [ProductosController::class, 'eliminar'])->name('producto.eliminar');
Route::get('productos', [ProductosController::class, 'index'])->name('producto.ver');
Route::get('productos/filtrado', [ProductosController::class, 'filtro'])->name('producto.filtrar');

Route::get('productos/like/{id}', [DeseosController::class, 'agregarProductoAlDeseo'])->name('deseo.like');
Route::get('deseo', [DeseosController::class, 'index'])->name('verDeseo');

Route::post('direccion/crear', [DireccionesController::class, 'crear'])->name('crearDireccion');
Route::get('direccion', [DireccionesController::class, 'index'])->name('direccion.ver');
Route::get('direccion/eliminar/{id}', [DireccionesController::class, 'eliminar'])->name('direccion.eliminar');

Route::get('categoria', [CategoriasController::class, 'index'])->name('categoria.ver');
Route::post('categoria', [CategoriasController::class, 'crear'])->name('categoria.crear');
Route::delete('categoria/eliminar/{id}', [CategoriasController::class, 'eliminar'])->name('categoria.eliminar');