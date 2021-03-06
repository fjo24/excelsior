<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestacadoHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destacado_homes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('titulo', 300);
            $table->text('subtitulo', 500);
            $table->text('contenido', 2000);
            $table->string('link', 400)->nullable();
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
        Schema::dropIfExists('destacado_homes');
    }
}
