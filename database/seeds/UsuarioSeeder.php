<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Usuario::create([
        	'nom_u' => 'Guido Alcón Llusco',
        	'email_u' => 'guedux@gmail.com',
            'direccion_u'=>'dashdkjashdk',
            'telefono_u'=>'2354234',
            'celular_u'=>'23542334',
        	'usuario' => 'guido',
        	'password' => '123456',
            'tipo' => 'adm',
        	]);
        Usuario::create([
            'nom_u' => 'Juan Torrez Galarza',
            'email_u' => 'jgf999@gmail.com',
            'direccion_u'=>'dashdkjashdk',
            'telefono_u'=>'2354234',
            'celular_u'=>'23542334',
            'usuario' => 'juan123',
            'password' => '123456',
            'tipo' => 'pro',
            ]);
    }
}
