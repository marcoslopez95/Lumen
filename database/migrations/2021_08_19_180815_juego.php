<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Juego extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juego', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jugador_id',false,true)->nullable();
            $table->string('nombre', 100)->nullable();
            $table->string('descripcion', 100)->nullable();
            $table->timestamps();

            $table->foreign('jugador_id')->references('id')->on('jugador')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juego');
    }
}
