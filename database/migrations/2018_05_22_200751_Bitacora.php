<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bitacora extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bitacora', function (Blueprint $table) {
            $table->increments('id');
            $table->string('accion_Bit');
            $table->string('comentario_Bit');
            $table->integer('id_Usuario')->unsigned();
            $table->foreign('id_Usuario')->references('id')->on('users');
            $table->rememberToken();
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
        Schema::drop('bitacora');
    }
}
