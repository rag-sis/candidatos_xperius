<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('pregunta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_p');
            $table->integer('cod_e');
            $table->string('valor_p');
            $table->enum('tipo_p',['Falso o Verdadero','Opcion de Llenado', 'Seleccion Simple','Seleccion Multiple']);
            $table->integer('puntaje_p');
            $table->enum('estado_p',[1, 0])->default(1);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::drop('pregunta');
    }
}
