<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacinas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('vacina');
            $table->string('dose');
            
            $table->integer('inicio_minimo_dias')->default(0);
            $table->integer('inicio_minimo_meses')->default(0);
            $table->integer('inicio_minimo_anos')->default(0);
            $table->integer('inicio_maximo_dias')->default(0);
            $table->integer('inicio_maximo_meses')->default(0);
            $table->integer('inicio_maximo_anos')->default(0);
            $table->integer('intervalo_recomendado_dias')->default(0);
            $table->integer('intervalo_recomendado_meses')->default(0);
            $table->integer('intervalo_recomendado_anos')->default(0);

            $table->unsignedBigInteger('vacina_exigida_id')->nullable();
            $table->foreign('vacina_exigida_id')->references('id')->on('vacinas');

            $table->string('status');
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
        Schema::dropIfExists('vacinas');
    }
}
