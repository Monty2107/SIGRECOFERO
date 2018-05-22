<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuentaPorCobrarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_por_cobrars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes');
            $table->integer('ano');
            $table->integer('id_Fecha')->unsigned();
            $table->foreign('id_Fecha')->references('id')->on('fechas');
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
        Schema::dropIfExists('cuenta_por_cobrars');
    }
}
