<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes_vacinas', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_pacientes_id');
            $table->unsignedBigInteger('fk_vacinas_id');
            $table->string('data_aplicacao');
            $table->foreign('fk_pacientes_id')->references('id')->on('pacientes');
            $table->foreign('fk_vacinas_id')->references('id')->on('vacinas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes_vacinas');
    }
}
