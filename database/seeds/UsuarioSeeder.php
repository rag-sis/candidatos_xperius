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
        	'nom_u' => 'Guido',
        	'ape_pat_u' => 'Alcon',
        	'ape_mat_u' => 'Llusco',
            'ci_u'=>'35324233',
        	'email_u' => 'guedux@gmail.com',
            'direccion_u'=>'dashdkjashdk',
            'telefono_u'=>'2354234',
            'celular_u'=>'23542334',
        	'usuario' => 'guido',
        	'password' => '123456',
            'tipo' => 'adm',
        	]);
        Usuario::create([
            'nom_u' => 'Juan',
            'ape_pat_u' => 'Galarza',
            'ape_mat_u' => 'Fernandez',
            'ci_u'=>'35324233',
            'email_u' => 'jgf999@gmail.com',
            'direccion_u'=>'dashdkjashdk',
            'telefono_u'=>'2354234',
            'celular_u'=>'23542334',
            'usuario' => 'juan123',
            'password' => '123456',
            'tipo' => 'pro',
            ]);
        Usuario::create([
            'nom_u' => 'Carlos',
            'ape_pat_u' => 'Villazon',
            'ape_mat_u' => 'Perez',
            'ci_u'=>'35324233',
            'email_u' => 'carlos456@gmail.com',
            'direccion_u'=>'dashdkjashdk',
            'telefono_u'=>'2354234',
            'celular_u'=>'23543234',
            'usuario' => 'carlos987',
            'password' => '123456',
            'tipo' => 'can',
            ]);
        Usuario::create([
            'nom_u' => 'Marco',
            'ape_pat_u' => 'Chavez',
            'ape_mat_u' => 'Lopez',
            'ci_u'=>'35324233',
            'email_u' => 'mcl6@gmail.com',
            'direccion_u'=>'dashdkjashdk',
            'telefono_u'=>'2354234',
            'celular_u'=>'23542334',
            'usuario' => 'marco123',
            'password' => '123456',
            'tipo' => 'can',
            ]);
    }
}
