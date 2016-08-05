<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEntrevista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('entrevista', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_en');
            $table->integer('cod_po_en');
            $table->integer('cod_eva_en');
            $table->string('descripcion_en')->nullable();
            $table->integer('puntaje_en')->default(0);
            $table->datetime('fecha_en');
            $table->enum('invitado_en',[1, 0])->default(0);
            $table->enum('entrevistado_en',[1, 0])->default(0);
            $table->enum('estado_en',[1, 0])->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('cod_po_en')->references('cod_po')->on('postulacion');
            $table->foreign('cod_eva_en')->references('cod_u')->on('usuarios');
            
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
        Schema::drop('entrevista');
    }
}
