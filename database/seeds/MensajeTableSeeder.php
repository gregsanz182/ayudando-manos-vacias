<?php

use Illuminate\Database\Seeder;
use App\Mensaje;
use Faker\Factory as Faker;

class MensajeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');
        for ($i=0; $i<=25; $i++)
        {
            Mensaje::create(array(
                'mensaje' => $faker->text($maxNbChars = 280),
                'fecha' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
                'correo_remitente' => $faker->freeEmail,
                'nombre_apellido_remitente' => $faker->name,
                'telefono_remitente' => $faker->optional()->e164PhoneNumber,
                'nino_id' => $faker->numberBetween($min = 1, $max=60)
            ));
        }
    }
}
