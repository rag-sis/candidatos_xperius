<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCalificacionExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('calificacion_examen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_cae');
            $table->integer('cod_po');
            $table->integer('cod_e');
            $table->integer('nota_cae')->default(0);
            $table->enum('estado_terminado_cae',[1, 0])->default(0);
            $table->datetime('fecha_hora_comienzo_cae')->nullable();
            $table->datetime('fecha_hora_final_cae')->nullable();
            $table->enum('estado_examen_tiempo_cae',[1, 0])->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cod_po')->references('cod_po')->on('postulacion');
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
        Schema::drop('calificacion_examen');
    }
}
