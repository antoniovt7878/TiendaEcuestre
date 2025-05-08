<?php

namespace App\Http\Controllers;

use App\Models\Deseo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeseosController extends Controller
{
    public function agregarProductoAlCarrito(Request $request, $id)
    {
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $usuarioId = $usuario->id;
        $deseo = Deseo::where('user_id', $usuarioId)->first();
    
        if ($deseo === null) {
            $deseo = new Deseo();
            $deseo->user_id = $usuarioId;
            $deseo->save();
        }

        $carrito = Carrito::where('user_id', $usuarioId)->first();
    
        $producto = Producto::findOrFail($id);
    
        $lineaDeCarrito = new LineaDeCarrito();
        $lineaDeCarrito->producto_id = $producto->id;
        $lineaDeCarrito->cantidad = 1;
        $lineaDeCarrito->carrito_id= $carrito->id;
        $lineaDeCarrito->importeParcial = $producto->precio * $lineaDeCarrito->cantidad;
        $carrito->importeTotal += $lineaDeCarrito->importeParcial;
    
        $lineaDeCarrito->save();
        $carrito->save();
    
        return redirect()->route('tienda.index');
    }

    public function eliminarProductoDelCarrito($id)
    {
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->firstOrFail();
        $lineaCarrito = LineaDeCarrito::where('carrito_id', $carrito->id)->where('producto_id', $id)->firstOrFail();
        $carrito->importeTotal -= $lineaCarrito->importeParcial;
        $carrito->save();
        $lineaCarrito->delete();

        return redirect()->route('verCarrito');
    }
}
