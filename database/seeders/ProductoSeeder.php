<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::create([
            'nombre' => 'Montura inglesa',
            'descripcion' => 'Montura inglesa',
            'precio' => 1000,
            'stock' => 5,
            'marca' => 'Ejemplo'
        ]);

        Producto::create([
            'nombre' => 'Montura vaquera',
            'descripcion' => 'Montura vaquera',
            'precio' => 750,
            'stock' => 5,
            'marca' => 'Ejemplo2'
        ]);
    }
}
