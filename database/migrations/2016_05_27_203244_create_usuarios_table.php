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
            $table->string('nom_u',100);
            $table->string('email_u',80)->unique();
            $table->string('direccion_u',200)->nullable();
            $table->integer('telefono_u')->nullable();
            $table->integer('celular_u')->nullable();
            $table->string('usuario',20)->unique();
            $table->string('password',200);
            $table->string('curriculum')->nullable();
            $table->string('url_curriculum')->nullable();
            $table->enum('tipo', ['adm', 'pro','can']);
            $table->enum('activo', [1, 0])->default(1);
            $table->enum('act_pwd', [1, 0])->default(0);
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
