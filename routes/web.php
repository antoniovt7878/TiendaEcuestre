<?php

use App\Http\Controllers\TiendaController;
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
/*Route::get('/home', function () {
    return view('home');
});*/
/*
Route::get('/home', function () {
     return view('tienda.home');
     })->middleware(['auth','verified'])->name('home');
 */
 /*  PARA LOS CONTROLADORES
    Route::resource('carritos', CarritoController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('imagen-productos', ImagenProductoController::class);
    Route::resource('users', UserController::class);
    Route::resource('pedidos', PedidoController::class);
    Route::resource('direcciones', DireccionController::class);
    Route::resource('metodos-pago', MetodoPagoController::class);
    Route::resource('detalle-pedidos', DetallePedidoController::class);

 */