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
            $table->unsignedBigInteger('fk_unidades_id')->nullable();
            $table->date('data_aplicacao')->nullable()->default(NULL);
            $table->string('descricao_outras')->nullable()->default(NULL);
            $table->foreign('fk_pacientes_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('fk_vacinas_id')->references('id')->on('vacinas')->onDelete('cascade');
            $table->foreign('fk_unidades_id')->references('id')->on('unidades')->onDelete('cascade');
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
