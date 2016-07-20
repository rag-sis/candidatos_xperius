<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAsignacionExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('asignacion_examen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_ae');
            $table->integer('cod_v');
            $table->integer('cod_e');
            $table->integer('valor_puntaje_ae');
            $table->enum('estado_ae',[1, 0])->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cod_v')->references('cod_v')->on('vacante');
            $table->foreign('cod_e')->references('cod_e')->on('examen');
            
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
        Schema::drop('asignacion_examen');
    }
}
