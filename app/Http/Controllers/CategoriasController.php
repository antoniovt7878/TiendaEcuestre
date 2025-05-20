<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller{
    
    public function index(){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $categorias = Categoria::all();

        return view('categoria.categoria', compact('categorias'));
    }

    public function crear(Request $request){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $categoria = new Categoria();
        $categoria->nombre=$request->nombre;
        $categoria->save();

        return redirect()->route('categoria.ver');
    }
    
    public function eliminar($id){
        $usuario = Auth::user();
        if (!$usuario) {
            return redirect()->route('tienda.index');
        }

        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categoria.ver');
    }
}
