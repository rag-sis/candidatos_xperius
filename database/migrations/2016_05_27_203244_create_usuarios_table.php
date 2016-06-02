<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            
            $table->engine = 'InnoDB';
            $table->increments('cod_u');
            $table->string('nom_u',30);
            $table->string('ape_pat_u',30);
            $table->string('ape_mat_u',30);
            $table->integer('ci_u');
            $table->string('email_u',80)->unique();
            $table->string('direccion_u',200);
            $table->integer('telefono_u')->nullable();
            $table->integer('celular_u');
            $table->string('usuario',20);
            $table->string('password',200);
            $table->enum('tipo', ['adm', 'pro','can']);
            $table->enum('activo', [1, 0])->default(1);
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
        Schema::drop('usuarios');
    }
}
