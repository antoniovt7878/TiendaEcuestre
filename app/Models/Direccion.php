<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $table = 'direcciones';

    protected $fillable = [
        'calle',
        'ciudad',
        'codigo_postal',
        'user_id',
        'venta_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function venta()
    {
        return $this->hasOne(Venta::class);
    }
}


