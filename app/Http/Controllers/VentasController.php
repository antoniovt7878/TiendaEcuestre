<?php

namespace App\Http\Controllers;

use App\Mail\VentaFinalizada;
use App\Models\LineaDeVenta;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class VentasController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }
        if(session('user_rol')=='admin'){
            $ventas = Venta::all();
        }else{
            $ventas = Venta::where('user_id', $usuario->id)->get();
        }


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

    public function modificar(Request $request, $id){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $venta = Venta::findOrFail($id);

        $venta->estado = $request->estado;
        $venta->save();

        return redirect()->route('verVentas');
    }
}
