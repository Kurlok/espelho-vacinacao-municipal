<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('nome_mae');
            $table->string('sus')->nullable();
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('gestante');
            $table->string('obito');
            $table->string('localidade');
            $table->string('telefone')->nullable();
            $table->string('telefone_alternativo')->nullable();
            $table->text('observacoes')->nullable();
            $table->unsignedBigInteger('fk_users_id')->nullable();
            $table->foreign('fk_users_id')->references('id')->on('users');
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
        Schema::dropIfExists('pacientes');
    }
}
