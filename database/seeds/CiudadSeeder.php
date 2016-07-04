<?php

use Illuminate\Database\Seeder;
use App\Ciudad;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Ciudad::create([
        	'nom_c' => 'Cochabamba',
        	]);

        Ciudad::create([
            'nom_c' => 'Santa Cruz',
            ]);

        Ciudad::create([
            'nom_c' => 'La Paz',
            ]);
        Ciudad::create([
            'nom_c' => 'Oruro',
            ]);
        Ciudad::create([
            'nom_c' => 'Potosi',
            ]);
        Ciudad::create([
            'nom_c' => 'Chuquisaca',
            ]);
        Ciudad::create([
            'nom_c' => 'Tarija',
            ]);

        Ciudad::create([
            'nom_c' => 'Pando',
            ]);
        Ciudad::create([
            'nom_c' => 'Beni',
            ]);

    }
}
