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
            // $table->integer('inicio_minimo_meses')->nullable()->default(0);
            // $table->integer('inicio_minimo_anos')->nullable()->default(0);
            $table->integer('inicio_maximo_dias')->default(0);
            // $table->integer('inicio_maximo_meses')->nullable()->default(0);
            // $table->integer('inicio_maximo_anos')->nullable()->default(0);

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
