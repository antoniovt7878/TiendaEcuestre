<?php

namespace App\Http\Controllers;

use App\Models\LineaDeCarrito;
use App\Models\LineaDeVenta;
use App\Models\Producto;
use App\Models\Venta;
use Database\Seeders\ProductoCategoriaSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $productos = Producto::all();

        return view('producto.producto', compact('productos'));
    }

    public function crear(Request $request){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $producto = new Producto();
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->marca=$request->marca;
        $producto->save();

        return redirect()->route('producto.ver');
    }

    public function guardar(Request $request, $id){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $producto = Producto::findOrFail($id);
        $producto->nombre=$request->nombre;
        $producto->descripcion=$request->descripcion;
        $producto->precio=$request->precio;
        $producto->stock=$request->stock;
        $producto->marca=$request->marca;
        $producto->save();

        return redirect()->route('producto.ver');
    }

    public function eliminar($id){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $producto = Producto::findOrFail($id);

        $lineaVenta=LineaDeVenta::where('producto_id', $id)->get();
        $lineaCarrito=LineaDeCarrito::where('producto_id', $id)->get();

        foreach($lineaVenta as $linea){
            $linea->delete();
        }

        foreach($lineaCarrito as $linea){
            $linea->delete();
        }
        
        $producto->delete();

        return redirect()->route('producto.ver');
    }
}
