<?php

use Illuminate\Database\Seeder;
use App\Nino_Cancer;
use Faker\Factory as Faker;

class Nino_CancerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        $estadoActual = [
            'Remitiendo',
            'Metástasis',
            'Avanzando',
            'Etapa inicial',
            'Grave'
        ];
        for ($i=0; $i<60; $i++)
        {
            Nino_Cancer::create(array(
                'id' => Nino_Cancer::getNextId(),
                'fecha_desde' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'estado_actual' => $estadoActual[array_rand($estadoActual)],
                'nino_id' => $i+1,
                'cancer_id' => rand(1, 12)
            ));
        }
    }
}
