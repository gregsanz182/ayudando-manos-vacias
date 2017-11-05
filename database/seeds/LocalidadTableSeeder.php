<?php

use Illuminate\Database\Seeder;
use App\Localidad;

class LocalidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonStr = File::get('database/data/venezuela.json');
        $localidades = $json = json_decode($jsonStr, true);

        foreach($localidades as $localidad)
        {
            $estado = Localidad::create(array('nombre' => $localidad['estado']));
            foreach($localidad['municipios'] as $municipio)
            {
                Localidad::create(array('nombre' => $municipio['municipio'], 'localidad_id' => $estado->id));
            }
        }
    }
}
