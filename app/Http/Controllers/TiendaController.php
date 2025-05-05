<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    public function index(Request $request){
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $usuario = Auth::user();

        $rol=Rol::findOrFail($usuario->rol_id);

        session(['user_rol' => $rol->name]);

        if($rol->name === 'admin'){
            return view('homeAdmin');
        }else{
            $productos = Producto::all();
            return view('home', compact('productos'));
        }
    }
}
