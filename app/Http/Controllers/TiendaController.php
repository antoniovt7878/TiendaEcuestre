<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TiendaController extends Controller
{
    public function index(Request $request){
        Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $productos = Producto::all();
        return view('home', compact('productos'));
    }
}
