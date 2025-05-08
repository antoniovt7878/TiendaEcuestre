<?php

namespace App\Http\Controllers;

use App\Models\Deseo;
use App\Models\LineaDeDeseo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeseosController extends Controller
{
    public function index(){
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

        $lineaDeseo = [];
        $productos = [];

        if ($deseo) {
            $lineaDeseo = LineaDeDeseo::where('deseo_id', $deseo->id)->get();
        }

        foreach($lineaDeseo as $linea){
            $producto = Producto::findOrFail($linea->producto_id);

            if($producto){
                $productos[] = [
                    'id' => $producto->id,
                    'nombre' => $producto->nombre,
                    'precio' => $producto->precio,
                ];
            }
        }

        $deseoMax = Producto::orderBy('deseo', 'desc')->first();

        return view('deseo.deseo', compact('productos','deseoMax'));
    }
    
    public function agregarProductoAlDeseo($id)
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

        $deseo = Deseo::where('user_id', $usuarioId)->first();
    
        $producto = Producto::findOrFail($id);

        $verificarProductoEnDeseo = LineaDeDeseo::where('producto_id', $producto->id)->where('deseo_id', $deseo->id)->first();
        if ($verificarProductoEnDeseo) {
            $producto->deseo -= 1;
            $producto->save();
            $verificarProductoEnDeseo->delete();
        }else{
            $lineaDeDeseo = new LineaDeDeseo();
            $lineaDeDeseo->producto_id = $producto->id;
            $lineaDeDeseo->deseo_id = $deseo->id;
            $producto->deseo += 1;
            $producto->save();
    
            $lineaDeDeseo->save();
        }
    
        return redirect()->back();
    }
}
