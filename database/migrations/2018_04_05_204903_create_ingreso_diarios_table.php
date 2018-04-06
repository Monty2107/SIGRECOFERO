<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoDiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_diarios', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('concepto',['Administrativo','Parqueo', 'otros']);
            $table->boolean('formaPago');// 0- efectivo  1- cheque
            $table->string('NCheque')->nullable();
            $table->double('cantidad',8,2);
            $table->string('descripcion')->nullable();
            $table->integer('id_Fecha')->unsigned();
            $table->foreign('id_Fecha')->references('id')->on('fechas');
            $table->integer('id_Estado')->unsigned();
            $table->foreign('id_Estado')->references('id')->on('estados');
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
        Schema::dropIfExists('ingreso_diarios');
    }
}
