<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Jinete'
        ]);
        Categoria::create([
            'nombre' => 'Caballo'
        ]);
        Categoria::create([
            'nombre' => 'Transporte'
        ]);
        Categoria::create([
            'nombre' => 'Otro'
        ]);
    }
}
