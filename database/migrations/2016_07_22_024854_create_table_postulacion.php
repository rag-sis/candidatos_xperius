<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePostulacion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('postulacion', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_po');
            $table->integer('cod_u');
            $table->integer('cod_v');
            $table->enum('invitado_po',[1, 0])->default(0);
            $table->enum('entrevistado_po',[1, 0])->default(0);
            $table->integer('puntaje_cu_po')->nullable();
            $table->integer('puntaje_ex_po')->nullable();
            $table->integer('puntaje_en_po')->nullable();
            $table->enum('estado_po',[1, 0])->default(1);
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
        Schema::drop('postulacion');
    }
}
