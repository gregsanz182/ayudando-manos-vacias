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
            while(true)
            {
                $nino_id = rand(1, 60);
                $randCatInsumo = array_rand($nombre);
                if (Nino_Insumo::where('nino_id', $nino_id)->where('categoria_insumo_id', $nombre[$randCatInsumo][1])->count() == 0)
                {
                    Nino_Insumo::create(array(
                        'nombre' => $nombre[$randCatInsumo][0],
                        'fecha' => $faker->date($format = 'Y-m-d', $max = 'now'),
                        'estado_requerimiento' => $estadoActual[array_rand($estadoActual)],
                        'nino_id' => $nino_id,
                        'categoria_insumo_id' => $nombre[$randCatInsumo][1]
                    ));
                    break;
                }
            }
        }
    }
}
