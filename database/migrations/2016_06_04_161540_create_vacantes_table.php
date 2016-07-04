<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacante', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('cod_v');
            $table->string('titulo_v',100);
            $table->enum('lugar_v',['Cochabamba','La Paz','Santa Cruz','Oruro','Chuquisaca','Beni','Potosi','Tarija','Pando']);
            $table->string('posicion_v',100);
            $table->enum('tiempo_trabajo_v',['Tiempo Completo', 'Medio Tiempo']);
            $table->enum('tipo_trabajo_v',['Fuera de Oficina', 'Dentro de Oficina']);
            $table->text('descripcion_v');
            $table->enum('estado_v',[1, 0])->default(1);
            $table->rememberToken();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vacante');
    }
}
