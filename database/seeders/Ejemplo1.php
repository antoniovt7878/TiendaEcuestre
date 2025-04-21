<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class Ejemplo1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Juan Perez',
            'email' => 'juan@example.com',
            'password' => bcrypt('12345678')
        ]);

        User::create([
            'name' => 'Maria Gonzalez',
            'email' => 'maria@example.com',
            'password' => bcrypt('65432189')
        ]);
        //
    }
}
