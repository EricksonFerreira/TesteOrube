<?php

use Illuminate\Database\Seeder;

class TipoAutomovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_automoveis')->insert([
            'nome' => 'Camionete',
        ]);
        DB::table('tipo_automoveis')->insert([
            'nome' => 'Carro de luxo',
        ]);
        DB::table('tipo_automoveis')->insert([
            'nome' => 'Carro de turísmo',
        ]);
        DB::table('tipo_automoveis')->insert([
            'nome' => 'Minicarro',
        ]);
        DB::table('tipo_automoveis')->insert([
            'nome' => 'Perua',
        ]);
        DB::table('tipo_automoveis')->insert([
            'nome' => 'Utilitário esportivo',
        ]);
    }
}
