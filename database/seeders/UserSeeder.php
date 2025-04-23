<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Antonio Vazquez',
            'email' => 'antoniovaztor2002@gmail.com',
            'password' => bcrypt('12345678'),
            'rol_id' => '1'

        ]);
        User::create([
            'name' => 'Angel Perez',
            'email' => 'perezmaestreangel@gmail.com',
            'password' => bcrypt('12345678'),
            'rol_id' => '1'
        ]);
        User::create([
            'name' => 'Jose Lopez',
            'email' => 'joselopez@gmail.com',
            'password' => bcrypt('12345678'),
            'rol_id' => '2'
        ]);
    }
}
