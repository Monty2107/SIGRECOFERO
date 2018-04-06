<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajaChicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caja_chicas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('estado');// 0-Ingresos , 1- Egresos
            $table->double('cantidad',8,2);
            $table->string('concepto');
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
        Schema::dropIfExists('caja_chicas');
    }
}
