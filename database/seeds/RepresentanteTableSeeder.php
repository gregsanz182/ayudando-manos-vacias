<?php

use Illuminate\Database\Seeder;
use App\Representante;
use App\Usuario;
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
            $name = $faker->firstName($gender = ($genderRand==1?'female':'male'));
            $l_name = $faker->lastName;
            Representante::create(array(
                'cedula' => $faker->unique()->numberBetween($min = 9000000, $max=24000000),
                'nombre' => $name,
                'apellido' => $l_name,
                'genero' => ( $genderRand==1 ? 'F' : 'M'),
                'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = '1999-01-01'),
                'telefono' => $faker->e164PhoneNumber,
                'direccion' => $faker->address,
                'localidad_id' => $faker->numberBetween($min = 26, $max=56)
            ));

            Usuario::create([
                'usuario' => $name.'_'.$l_name.'_'.rand(1, 2000),
                'contrasena' => bcrypt('12345'),
                'rol_type' => 'App\Representante',
                'correo' => $faker->freeEmail,
                'rol_id' => $i+1,
                'estado_cuenta' => rand(1, 5)==1?0:1
            ]);
        }
    }
}
