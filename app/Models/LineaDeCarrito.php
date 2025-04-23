<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineaDeCarrito extends Model
{
    use HasFactory;

    public function carrito (){
        return $this->belongsTo(Carrito::class);
    }

    public function producto (){
        return $this->belongsTo(Producto::class);
    }
}
