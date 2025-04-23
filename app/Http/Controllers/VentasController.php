<?php

namespace App\Http\Controllers;

use App\Models\LineaDeVenta;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentasController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $ventas = Venta::where('user_id', $usuario->id)->get();

        return view('venta', compact('ventas'));
    }

    public function consultar($id){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $lineaVenta=LineaDeVenta::where('venta_id', $id)->get();

        $productos=[];

        foreach($lineaVenta as $linea){
            $producto = Producto::findOrFail($linea->producto_id);

            if($producto){
                $productos[] = [
                    'nombre' => $producto->nombre,
                    'precioParcial' => $linea->importeParcial,
                    'cantidad' => $linea->cantidad
                ];
            }
        }

        return view('ventaConsulta', compact('productos'));
    }
}
