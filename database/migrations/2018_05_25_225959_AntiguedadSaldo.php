<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AntiguedadSaldo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('AntiguedadSaldo', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado',['Deudas','Pagos','Antiguo']);// 0-Ingresos , 1- Egresos
            $table->double('cantidad',8,2);
            $table->string('concepto');
            $table->integer('id_Condominio')->unsigned();
            $table->foreign('id_Condominio')->references('id')->on('condominio');
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
        Schema::dropIfExists('AntiguedadSaldo');
    }
}
