<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutomoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('automoveis', function (Blueprint $table) {

            $table->Increments('id');
            $table->string('modelo');
            $table->string('placa');
            $table->string('ano_fabricacao');
            $table->string('ano_modelo');
            $table->string('cor');
            $table->string('portas');
            $table->string('valor');
            $table->longText('descricao');
            $table->string('imagem')->nullable();


            //Relacionamento com Users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            //Relacionamento com Marcas
            $table->unsignedInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas')->onDelete('cascade');

            //Relacionamento com Tipos de automoveis
            $table->unsignedInteger('tipoAuto_id');
            $table->foreign('tipoAuto_id')->references('id')->on('tipo_automoveis')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('automoveis');
    }
}
