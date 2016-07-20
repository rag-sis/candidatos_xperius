<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExamen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('examen', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_e');
            $table->integer('codigo_evaluador');
            $table->string('titulo_e',100);
            $table->enum('estado_e',[1, 0])->default(1);
            $table->text('descripcion_e')->nullable();
            $table->integer('puntaje_maximo_e')->default(100);
            $table->integer('tiempo_minutos_e');
            $table->integer('num_preguntas_e');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('codigo_evaluador')->references('cod_u')->on('usuarios');
            
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
        Schema::drop('examen');
    }
}
