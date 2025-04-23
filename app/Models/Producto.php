<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    public function LineaDeVenta (){
        return $this->belongsTo(LineaDeVenta::class);
    }

    public function LineaDeCarrito (){
        return $this->belongsTo(LineaDeCarrito::class);
    }
    
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'producto_categoria');
    }
}
