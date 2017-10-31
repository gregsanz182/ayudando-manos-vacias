<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Nino_Medicamento;
use App\Nino;

class Nino_MedicamentoTableSeeder extends Seeder
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
            'Donado',
            'Requerido'
        ];
        for ($i=0; $i<200; $i++)
        {
            $nino = Nino::find(rand(1, 60));
            Nino_Medicamento::create(array(
                    'id' => Nino_Medicamento::getNextId(),
                    'fecha' => $faker->dateTimeBetween($startDate = $nino->created_at, $endDate = '1 years'),
                    'estado_requerimiento' => $estadoActual[array_rand($estadoActual)],
                    'nino_id' => $nino->id,
                    'cantidad' => rand(1, 20),
                    'medicamento_id' => rand(1, 13)
            ));
        }
    }
}
