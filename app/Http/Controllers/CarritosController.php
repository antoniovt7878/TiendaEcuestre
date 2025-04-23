<?php

namespace App\Http\Controllers;

use App\Models\Carrito;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\LineaDeCarrito;

class CarritosController extends Controller
{
    public function agregarProductoAlCarrito(Request $request, $id)
    {
        $usuario = auth()->user();
        if (!$usuario) {
            return redirect()->route('carrito');
        }

        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->first();
    
        if ($carrito === null) {
            $carrito = new Carrito();
            $carrito->user_id = $usuarioId; 
            $carrito->importeTotal = 0;
            $carrito->save();
        }
    
        $producto = Producto::findOrFail($id);
    
        $lineaDeCarrito = new LineaDeCarrito();
        $lineaDeCarrito->producto_id = $producto->id;
        $lineaDeCarrito->cantidad = 1;
        $lineaDeCarrito->importeParcial = $producto->precio * $lineaDeCarrito->cantidad;
        $carrito->importeTotal += $lineaDeCarrito->importeParcial;
    
        $lineaDeCarrito->save();
        $carrito->save();
    
        return redirect()->route('carrito');
    }

    public function eliminarProductoDelCarrito($id)
    {
        $carrito = Carrito::where('user_id', auth()->id())->where('producto_id', $id)->firstOrFail();

        $carrito->delete();

        return redirect()->route('tienda.index')->with('success', 'Producto eliminado del carrito.');
    }
}
