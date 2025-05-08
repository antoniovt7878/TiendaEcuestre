<?php

namespace App\Http\Controllers;

use App\Models\Direccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DireccionesController extends Controller
{
    public function index(){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $direcciones = Direccion::where('user_id', $usuario->id)->get();

        return view('direccion.direccion', compact('direcciones'));
    }

    public function crear(Request $request){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $direccion = new Direccion();
        $direccion->calle = $request->calle;
        $direccion->ciudad = $request->ciudad;
        $direccion->codigo_postal = $request->codigo_postal;
        $direccion->user_id = $usuario->id;
        $direccion->save();

        return redirect()->route('direccion.ver');
    }

    public function eliminar($id){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $direccion = Direccion::findOrFail($id);
        
        $direccion->delete();

        return redirect()->route('producto.ver');
    }

    public function guardar(Request $request, $id){
        
    }
}
