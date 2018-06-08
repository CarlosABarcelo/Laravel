<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntradasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('slug');
            $table->string('autor');
            $table->longText('contenido');
            $table->string('resumen');
            //$table->dateTime('fecha_creacion');
            $table->integer('id_categoria');
            $table->boolean('privado');
            $table->string('fichero');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entradas');
    }
}
