<?php

use Illuminate\Database\Seeder;

class AutomovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('automoveis')->insert([
            'modelo' => 'SW4',
            'placa' => 'ANC-2020',
            'ano_fabricacao' => '2018',
            'ano_modelo' => '2017',
            'cor' => 'vermelho',
            'portas' => '4',
            'valor' => 'R$ 200.000,00',
            'descricao' => 'Carro muito bonito e moderno!',
            'imagem' => 'orube5.jpg',
            'user_id' => 1,
            'marca_id' => 1,
            'tipoAuto_id' => 1,
        ]);
    }
}
