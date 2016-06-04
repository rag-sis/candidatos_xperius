<?php

use Illuminate\Database\Seeder;
use App\Vacante;


class VacanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Vacante::create([
        	'titulo_v' => '.NET Developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);

         Vacante::create([
        	'titulo_v' => 'PHP developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);
          Vacante::create([
        	'titulo_v' => 'Drupal Developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);
           Vacante::create([
        	'titulo_v' => 'Angular Developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);
            Vacante::create([
        	'titulo_v' => 'Java Developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);
        	 Vacante::create([
        	'titulo_v' => 'Mobile Ionic developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);
        	  Vacante::create([
        	'titulo_v' => 'Zend developer',
        	'lugar_v' => 'Cochabamba',
        	'area_v' => 'Desarrollador',
            'tiempo_trabajo_v'=>'Tiempo Completo',
        	'tipo_trabajo_v' => 'Fuera de Oficina',
            'descripcion_v'=>'fdskfhjdshfjksdhfkjshdfhsdkjhfksdjhfkjsheuheuie',
            'estado_v'=>'1',
        	]);

        
    }
}
