<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('invitacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_i');
            $table->integer('cod_u');
            $table->integer('cod_v');
            $table->enum('invitado_i',[1, 0])->default(0);
            $table->enum('estado_i',[1, 0])->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cod_u')->references('cod_u')->on('usuarios');
            $table->foreign('cod_v')->references('cod_v')->on('vacante');
            
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('invitado');
    }
}
