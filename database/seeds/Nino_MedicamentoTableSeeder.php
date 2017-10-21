<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Nino_Medicamento;

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
            while(true)
            {
                $nino_id = rand(1, 60);
                $medicamento_id = rand(1, 14);
                if (Nino_Medicamento::where('nino_id', $nino_id)->where('medicamento_id', $medicamento_id)->count() == 0)
                {
                    Nino_Medicamento::create(array(
                        'id' => Nino_Medicamento::getNextId(),
                        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
                        'estado_requerimiento' => $estadoActual[array_rand($estadoActual)],
                        'nino_id' => $nino_id,
                        'medicamento_id' => $medicamento_id
                    ));
                    break;
                }
            }
        }
    }
}
