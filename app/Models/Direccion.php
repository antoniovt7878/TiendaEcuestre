<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'direccion', 'ciudad', 'cp', 'pais'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}