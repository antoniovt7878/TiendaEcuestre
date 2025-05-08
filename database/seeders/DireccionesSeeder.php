<?php

namespace Database\Seeders;

use App\Models\Direccion;
use Illuminate\Database\Seeder;

class DireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Direccion::create([
            'calle' => 'Calle Falsa 123',
            'ciudad' => 'Sevilla',
            'codigo_postal' => '41001',
            'user_id' => 1,
            //'venta_id' => 1
        ]);

        Direccion::create([
            'calle' => 'Avenida de la Paz 45',
            'ciudad' => 'Madrid',
            'codigo_postal' => '28001',
            'user_id' => 2,
            //'venta_id' => 2
        ]);

        Direccion::create([
            'calle' => 'Plaza Mayor 7',
            'ciudad' => 'Valencia',
            'codigo_postal' => '46001',
            'user_id' => 3,
            //'venta_id' => 3
        ]);
    }
}

