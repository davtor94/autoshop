<?php

use Illuminate\Database\Seeder;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ad::create([
            'title' => 'Oferta!!',
            'subtitle' => 'Cambio de Anticongelante',
            'content' => 'Cambio de anticongelante y revision de fugas',
            'price' => 'Desde $250',
        ]);

        \App\Models\Ad::create([
            'title' => 'Oferta!!',
            'subtitle' => 'Rotacion de llantas',
            'content' => 'Rotacion y revision de llantas',
            'price' => 'Desde $250',
        ]);

        \App\Models\Ad::create([
            'title' => 'Oferta!!',
            'subtitle' => 'Afinacion mayor',
            'content' => 'Cambio de filtros, aceite y lavado de inyectores',
            'price' => 'Desde $1,250',
        ]);

        \App\Models\Ad::create([
            'title' => 'Oferta!!',
            'subtitle' => 'Cambio de aceite',
            'content' => 'Cambio de filtro y 4 lts de aceite',
            'price' => 'Desde $250',
        ]);
    }
}
