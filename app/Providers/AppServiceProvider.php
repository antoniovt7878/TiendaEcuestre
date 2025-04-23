<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrito;
use App\Models\LineaDeCarrito;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    public function boot()
    {
        View::composer('*', function ($view) {
            $usuario = Auth::user();
            $cantidad = 0;
    
            if ($usuario) {
                $carrito = Carrito::where('user_id', $usuario->id)->first();
                if($carrito){
                    $cantidad = LineaDeCarrito::where('carrito_id', $carrito->id)->sum('cantidad');
                }
            }
    
            $view->with('cantidadCarrito', $cantidad);
        });
    }
}
