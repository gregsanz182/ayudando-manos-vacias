<?php

use Illuminate\Database\Seeder;
use App\Representante;
use Faker\Factory as Faker;

class RepresentanteTableSeeder extends Seeder
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
            $genderRand = rand(0, 1);
            Representante::create(array(
                'cedula' => $faker->unique()->numberBetween($min = 9000000, $max=24000000),
                'nombre' => $faker->firstName($gender = ($genderRand==1?'female':'male')),
                'apellido' => $faker->lastName,
                'genero' => ( $genderRand==1 ? 'F' : 'M'),
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '1999-01-01'),
                'telefono' => $faker->e164PhoneNumber,
                'direccion' => $faker->address,
                'localidad_id' => $faker->numberBetween($min = 26, $max=56)
            ));
        }
    }
}
