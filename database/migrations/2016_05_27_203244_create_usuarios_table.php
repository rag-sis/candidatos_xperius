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
            
            $table->increments('cod_u');
            $table->string('nom_u');
            $table->string('ape_pat_u');
            $table->string('ape_mat_u');
            $table->string('ci_u');
            $table->string('email_u')->unique();
            $table->string('direccion_u');
            $table->string('telefono_u');
            $table->string('celular_u');
            $table->string('usuario');
            $table->string('password');
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
