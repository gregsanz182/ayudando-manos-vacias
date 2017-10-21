<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Nino_Insumo;

class Nino_InsumoTableSeeder extends Seeder
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
        $nombre = [
            ['Pañales RN', 2],
            ['Pañales RN+', 2],
            ['Pañales P', 2],
            ['Pañales M', 2],
            ['Pañales G', 2],
            ['Pañales XG', 2],
            ['Pañales XXG', 2],
            ['Jeringa hipodermica', 4],
            ['Inyectadoras de insulina', 4],
            ['Jeringa de tuberculina', 4],
            ['Jeringa de vidrio', 4],
            ['Sabanas para cama', 5], 
            ['Algodon hipoalergenico', 6]
        ];
        for ($i=0; $i<100; $i++)
        {
            $randCatInsumo = array_rand($nombre);
            Nino_Insumo::create(array(
                    'id' => Nino_Insumo::getNextId(),
                    'nombre' => $nombre[$randCatInsumo][0],
                    'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
                    'estado_requerimiento' => $estadoActual[array_rand($estadoActual)],
                    'nino_id' => rand(1, 60),
                    'categoria_insumo_id' => $nombre[$randCatInsumo][1]
            ));
        }
    }
}
