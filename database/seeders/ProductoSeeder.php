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
            'nombre' => 'Montura australiana',
            'descripcion' => 'Montura australiana resistente y cómoda para largas travesías.',
            'precio' => 1200,
            'stock' => 3,
            'marca' => 'Outback Tack',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Montura portuguesa',
            'descripcion' => 'Montura tradicional portuguesa de alta calidad.',
            'precio' => 1100,
            'stock' => 4,
            'marca' => 'Lusitano Gear',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Montura de salto',
            'descripcion' => 'Montura especialmente diseñada para salto ecuestre.',
            'precio' => 1300,
            'stock' => 6,
            'marca' => 'JumpPro',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Montura de doma clásica',
            'descripcion' => 'Ideal para competiciones de doma clásica.',
            'precio' => 1450,
            'stock' => 2,
            'marca' => 'Dressage Elite',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Montura infantil',
            'descripcion' => 'Montura ligera y segura para niños.',
            'precio' => 600,
            'stock' => 8,
            'marca' => 'PonySafe',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Montura de cuero premium',
            'descripcion' => 'Montura hecha con cuero de la más alta calidad.',
            'precio' => 2000,
            'stock' => 1,
            'marca' => 'Elite Saddlery',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Remolque para caballos',
            'descripcion' => 'Remolque con espacio para dos caballos, ventilado.',
            'precio' => 5000,
            'stock' => 2,
            'marca' => 'HorseMove',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Cepillo para crin',
            'descripcion' => 'Cepillo suave ideal para el cuidado de la crin del caballo.',
            'precio' => 25,
            'stock' => 30,
            'marca' => 'EquiCare',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Casco de equitación',
            'descripcion' => 'Casco protector para jinetes, cumple normas europeas.',
            'precio' => 90,
            'stock' => 10,
            'marca' => 'SafeRide',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Botas de montar',
            'descripcion' => 'Botas de cuero para montar a caballo.',
            'precio' => 150,
            'stock' => 7,
            'marca' => 'RiderPro',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Alforjas para montura',
            'descripcion' => 'Alforjas impermeables para largas travesías.',
            'precio' => 60,
            'stock' => 6,
            'marca' => 'TrailPack',
            'deseo' => 0
        ]);

        Producto::create([
            'nombre' => 'Cuerda de amarre',
            'descripcion' => 'Cuerda resistente para sujetar al caballo.',
            'precio' => 15,
            'stock' => 20,
            'marca' => 'StableLine',
            'deseo' => 0
        ]);

    }
}
