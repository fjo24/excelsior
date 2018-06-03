<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestacadoEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destacado_empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo', 300);
            $table->text('subtitulo', 500);
            $table->text('contenido', 2000);
            $table->string('titulo2', 300);
            $table->text('subtitulo2', 500);
            $table->text('contenido2', 2000);
            $table->string('imagen');
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
        Schema::dropIfExists('destacado_empresas');
    }
}
