<?php

use Illuminate\Database\Seeder;
use App\Cancer;

class CancerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = [
            ['Garganta', 'Cáncer de garganta'],
            ['Leucemia', 'Cáncer en la sangre'],
            ['Tiroides', 'Cáncer en las glandulas tiroides'],
            ['Huesos', 'Cáncer en la estrutura osea'],
            ['Próstata', 'Cáncer en la próstata'],
            ['Seno', 'Cáncer en las celulas mamarias'],
            ['Pulmon', 'Cáncer en los pulmones'],
            ['Hígado', 'Cáncer en el hígado'],
            ['Linfoma no Hodgkin', 'Cáncer en las celulas linfáticas'],
            ['Riñón', 'Cáncer renal'],
            ['Páncreas', 'Cáncer en el páncreas'],
            ['Melanoma', 'Cáncer en la piel']
        ];

        foreach ($inserts as $insert){
            Cancer::create(array('nombre' => $insert[0], 'descripcion' => $insert[1]));
        }

    }
}
