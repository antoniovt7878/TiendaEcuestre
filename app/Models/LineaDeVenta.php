<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LineaDeVenta extends Model
{
    use HasFactory;

    public function venta (){
        return $this->belongsTo(Venta::class);
    }

    public function producto (){
        return $this->belongsTo(Producto::class);
    }
}
