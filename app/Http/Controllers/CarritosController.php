<?php

namespace App\Http\Controllers;

use App\Mail\VentaFinalizada;
use App\Models\Carrito;
use App\Models\Direccion;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\LineaDeCarrito;
use App\Models\LineaDeVenta;
use App\Models\User;
use App\Models\Venta;
use BaconQrCodeTest\Common\VersionTest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CarritosController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->first();
    
        if ($carrito === null) {
            $carrito = new Carrito();
            $carrito->user_id = $usuarioId; 
            $carrito->importeTotal = 0;
            $carrito->save();
        }

        $importeTotal = $carrito->importeTotal;
        $lineaCarrito = [];
        $productos = [];

        if ($carrito) {
            $lineaCarrito = LineaDeCarrito::where('carrito_id', $carrito->id)->get();
        }

        foreach($lineaCarrito as $linea){
            $producto = Producto::findOrFail($linea->producto_id);

            if($producto){
                $productos[] = [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'precio' => $producto->precio,
                    'cantidad' => $linea->cantidad
                ];
            }
        }

        $direcciones = Direccion::where('user_id',$usuarioId)->get();

        return view('carrito', compact('productos','importeTotal','direcciones'));
    }

    public function agregarProductoAlCarrito(Request $request, $id)
    {
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $usuarioId = $usuario->id;
        $carrito = Carrito::where('user_id', $usuarioId)->first();
    
        if ($carrito === null) {
            $carrito = new Carrito();
            $carrito->user_id = $usuarioId; 
            $carrito->importeTotal = 0;
            $carrito->save();
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
    
        return redirect()->route('producto.ver');
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

    public function terminarCarrito(Request $request)
    {
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }
        $usuario=User::findOrFail($usuario->id);

        $carrito = Carrito::where('user_id',$usuario->id)->firstOrFail();
        $direccion = Direccion::findOrFail($request->direccion);

        $venta = new Venta();
        $venta->user_id = $usuario->id;
        $venta->importeTotal = $carrito->importeTotal;
        $venta->estado = "Notificado";
        $venta->direccion_id = $direccion->id;
        $venta->save();

        $lineaCarrito = LineaDeCarrito::where('carrito_id', $carrito->id)->get();

        foreach($lineaCarrito as $linea){
            $lineaVenta = new LineaDeVenta();
            $lineaVenta->cantidad = $linea->cantidad;
            $lineaVenta->importeParcial = $linea->importeParcial;
            $lineaVenta->venta_id=$venta->id;
            $lineaVenta->producto_id=$linea->producto_id;
            $lineaVenta->save();
        }

        foreach($lineaCarrito as $linea){
            $linea->delete();
        }
        $carrito->delete();

        //Mail::to($usuario->email)->send(new VentaFinalizada($venta));

        return redirect()->route('verVentas');
    }
}
