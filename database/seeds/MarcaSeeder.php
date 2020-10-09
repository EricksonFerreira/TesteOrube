<?php

use Illuminate\Database\Seeder;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
            'nome' => 'Toyota',
            'imagem' => 'toyota.png',
        ]);
        DB::table('marcas')->insert([
            'nome' => 'Volkswagen',
            'imagem' => 'volkswagen.jpg',
        ]);
        DB::table('marcas')->insert([
            'nome' => 'Ford',
            'imagem' => 'ford.png',
        ]);
        DB::table('marcas')->insert([
            'nome' => 'Nissan',
            'imagem' => 'nissan.png',
        ]);
        DB::table('marcas')->insert([
            'nome' => 'Honda',
            'imagem' => 'honda.png',
        ]);
        DB::table('marcas')->insert([
            'nome' => 'Hyundai',
            'imagem' => 'hyundai.png',
        ]);
    }
}
