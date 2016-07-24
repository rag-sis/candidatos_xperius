<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRegistroRespuestas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
          Schema::create('registro_respuesta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_rr');
            $table->integer('cod_cae');
            $table->integer('cod_p');
            $table->integer('cod_r')->nullable();
            $table->string('valor_rr')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cod_cae')->references('cod_cae')->on('calificacion_examen');
            $table->foreign('cod_p')->references('cod_p')->on('pregunta');
            $table->foreign('cod_r')->references('cod_r')->on('respuesta');
            
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
         Schema::drop('registro_respuesta');
    }
}
