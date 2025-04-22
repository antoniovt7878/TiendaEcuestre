<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'categoria_id',
    ];

    // Relaciones
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }


    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class);
    }

    public function detallesPedido()
    {
        return $this->hasMany(DetallePedido::class);
    }

    public function carrito()
    {
        return $this->hasMany(Carrito::class);
    }
        
}