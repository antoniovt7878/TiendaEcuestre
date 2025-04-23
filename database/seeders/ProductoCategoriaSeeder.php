<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('producto_categoria')->insert([
            [
                'producto_id' => 1,
                'categoria_id' => 1
            ],
            [
                'producto_id' => 1,
                'categoria_id' => 2
            ],
            [
                'producto_id' => 2,
                'categoria_id' => 1
            ],
            [
                'producto_id' => 2,
                'categoria_id' => 2
            ]
        ]);
    }
}
