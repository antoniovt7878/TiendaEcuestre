<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaDeDeseo extends Model
{
    use HasFactory;

    public function deseo (){
        return $this->belongsTo(Carrito::class);
    }

    public function producto (){
        return $this->belongsTo(Producto::class);
    }

    public function lineaDeDeseos (){
        return $this->hasMany(LineaDeDeseo::class);
    }
}
