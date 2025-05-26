<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $jinete = Categoria::where('nombre', 'Jinete')->first()->id;
        $caballo = Categoria::where('nombre', 'Caballo')->first()->id;
        $transporte = Categoria::where('nombre', 'Transporte')->first()->id;
        $otro = Categoria::where('nombre', 'Otro')->first()->id;

        Producto::where('nombre', 'Montura australiana')->first()?->categorias()->sync([$jinete, $caballo]);
        Producto::where('nombre', 'Montura portuguesa')->first()?->categorias()->sync([$jinete, $caballo]);
        Producto::where('nombre', 'Montura de salto')->first()?->categorias()->sync([$jinete, $caballo]);
        Producto::where('nombre', 'Montura de doma clásica')->first()?->categorias()->sync([$jinete, $caballo]);
        Producto::where('nombre', 'Montura infantil')->first()?->categorias()->sync([$jinete, $caballo]);
        Producto::where('nombre', 'Montura de cuero premium')->first()?->categorias()->sync([$jinete, $caballo]);
        Producto::where('nombre', 'Remolque para caballos')->first()?->categorias()->sync([$transporte]);
        Producto::where('nombre', 'Cepillo para crin')->first()?->categorias()->sync([$caballo]);
        Producto::where('nombre', 'Casco de equitación')->first()?->categorias()->sync([$jinete]);
        Producto::where('nombre', 'Botas de montar')->first()?->categorias()->sync([$jinete]);
        Producto::where('nombre', 'Alforjas para montura')->first()?->categorias()->sync([$jinete, $transporte]);
        Producto::where('nombre', 'Cuerda de amarre')->first()?->categorias()->sync([$caballo, $otro]);
    
    }
}
