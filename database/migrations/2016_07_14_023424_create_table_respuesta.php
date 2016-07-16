<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRespuesta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
        Schema::create('respuesta', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_r');
            $table->integer('cod_p');
            $table->string('valor_r');
            $table->string('result_r');
            $table->enum('estado_r',[1, 0])->default(1);
            $table->rememberToken();
            $table->timestamps();
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
        Schema::drop('respuesta');
    }
}
