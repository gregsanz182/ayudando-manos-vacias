<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Nino;

class NinoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        $situacion = [
            "Muy enfermo. Pocos meses de vida",
            "Su situacion mejora cada día",
            "Comenzando con condicion",
            "Mejora cada día pero el cancer aún no remite",
            "Aun tiene fortaleza",
            "Situacion muy grave"
        ];
        $relacion = [
            "Padre/Madre",
            "Tío(a)",
            "Primo(a)",
            "Hermano(a)",
            "Amigo(a)",
            "Abuelo(a)",
            "Padrino(a)", 
            "Padrastro/Madrastra"
        ];
        for ($i=0; $i<60; $i++)
        {
            $genderRand = rand(0, 1);
            Nino::create(array(
                'nombre' => $faker->firstName($gender = ($genderRand==1?'female':'male')),
                'apellido' => $faker->lastName,
                'genero' => ( $genderRand==1 ? 'F' : 'M'),
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'situacion_actual' => $situacion[array_rand($situacion)],
                'relacion_repr' => $relacion[array_rand($relacion)],
                'identificacion' => $faker->optional()->numberBetween($min = 23000000, $max=26000000),
                'representante_id' => $faker->numberBetween($min = 1, $max=25)
            ));
        }
    }
}
