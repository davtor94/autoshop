<?php

use Illuminate\Database\Seeder;

class TipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Tip::create([
            'title' => 'Frenos',
            'subtitle' => 'Revision preventiva',
            'content' => 'No olvides realizar una revision a todo el sistema de frenos antes de salir a carretera.',
            'image' => 'img/frenos.jpg',
        ]);

        \App\Models\Tip::create([
            'title' => 'Frenos',
            'subtitle' => 'Revision preventiva',
            'content' => 'No olvides realizar una revision a todo el sistema de frenos antes de salir a carretera.',
            'image' => 'img/frenos.jpg',
        ]);

        \App\Models\Tip::create([
            'title' => 'Emision de humo',
            'subtitle' => 'Cuida al planeta',
            'content' => 'Si detectas que tu automivil emite humo, no dudes en visitarnos, ya que esto es dañino para tu auto y tu planeta.',
            'image' => 'img/humo-escape.jpg',
        ]);
        \App\Models\Tip::create([
            'title' => 'Afinaciones periodicas',
            'subtitle' => 'Incrementa la vida de tu motor',
            'content' => 'Al realizar afinaciones anualmente o cada 12,000km disminuyes el desgaste de tu motor, tambien el consumo de gasoline disminuye.
            Por lo tanto, no olvides afinar tu vehiculo',
            'image' => 'img/afinacion.png',
        ]);

        \App\Models\Tip::create([
            'title' => 'Perdida de fluidos',
            'subtitle' => 'Deteccion de fugas',
            'content' => 'Si persibes que tu automivil deja manchas en el piso, o notas que algun contenedor baja de nivel, acude inmediatamente al mecanico, esto podria evitarte un gasto mayor.',
            'image' => 'img/fugas.jpg',
        ]);


    }
}
