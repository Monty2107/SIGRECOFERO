<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mes');
            $table->integer('ano');
            $table->boolean('estado'); // 0- Debe , 1- Pago
            $table->enum('concepto',['Administrativo','Parqueo', 'Otros']);
            $table->integer('id_Condominio')->unsigned();
            $table->foreign('id_Condominio')->references('id')->on('condominios');
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
        Schema::dropIfExists('estados');
    }
}
