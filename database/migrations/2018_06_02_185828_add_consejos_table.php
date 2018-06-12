<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConsejosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consejos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->text('texto1');
            $table->text('texto2');
            $table->string('imagen');
            $table->string('orden');
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
        Schema::dropIfExists('consejos');
    }
}
