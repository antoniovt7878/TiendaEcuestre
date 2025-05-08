<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model
{
    use HasFactory;

    public function user (){
        return $this->belongsTo(User::class);
    }

    public function lineaDeVentas (){
        return $this->hasMany(LineaDeVenta::class);
    }

    public function direccion()
    {
        return $this->belongsTo(Direccion::class);
    }

}
