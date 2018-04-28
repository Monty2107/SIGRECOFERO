<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacturacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturacions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('NFactura');
            $table->enum('concepto',['Administrativo','Parqueo','Otros']); // 0- adminitrativo ,  1- Parqueo
            $table->double('cantidad',8,2)->nullable();
            $table->enum('emision',['No Emitido','Emitido','Anulado']);
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
        Schema::dropIfExists('facturacions');
    }
}
