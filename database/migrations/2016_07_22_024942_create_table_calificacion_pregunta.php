<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCalificacionPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('calificacion_pregunta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_cap');
            $table->integer('cod_cae');
            $table->integer('cod_p');
            $table->integer('nota_cap');
            $table->enum('estado_terminado_cap',[1, 0])->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cod_cae')->references('cod_cae')->on('calificacion_examen');
            $table->foreign('cod_p')->references('cod_p')->on('pregunta');
            
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
        Schema::drop('calificacion_pregunta');
    }
}
