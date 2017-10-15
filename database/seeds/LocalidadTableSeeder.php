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
        $inserts = [
            ['Amazonas', NULL], //1
            ['Anzoátegui', NULL], //2
            ['Apure', NULL], //3
            ['Aragua', NULL], //4
            ['Barinas', NULL], //5
            ['Bolívar', NULL], //6
            ['Carabobo', NULL], //7
            ['Cojedes', NULL], //8
            ['Delta Amacuro', NULL], //9
            ['Distrito Capital', NULL], //10
            ['Falcón', NULL], //11
            ['Guárico', NULL], //12
            ['Lara', NULL], //13
            ['Mérida', NULL], //14
            ['Miranda', NULL], //15
            ['Monagas', NULL], //16
            ['Nueva Esparta', NULL], //17
            ['Portuguesa', NULL], //18
            ['Sucre', NULL], //19
            ['Táchira', NULL], //20
            ['Trujillo', NULL], //21
            ['Vargas', NULL], //22
            ['Yaracuy', NULL], //23
            ['Zulia', NULL], //24
            ['Dependencias Federales', NULL], //25
            ['Puerto Ayacucho', 1], 
            ['Barcelona', 2],
            ['San Fernando de Apure', 3],
            ['Maracay', 4],
            ['Barinas', 5],
            ['Ciudad Bolívar', 6],
            ['Valencia', 7],
            ['San Carlos', 8],
            ['Tucupita', 9],
            ['Caracas', 10], 
            ['Coro', 11],
            ['San Juan de Los Morros', 12],
            ['Barquisimeto', 13],
            ['Mérida', 14],
            ['Los Teques', 15],
            ['Maturín', 16],
            ['La Asunción', 17],
            ['Guanare', 18],
            ['Cumaná', 19],
            ['San Cristóbal', 20],
            ['Cárdenas', 20],
            ['Guasimos', 20],
            ['Independencia', 20],
            ['Libertad', 20],
            ['Junín', 20],
            ['Jáuregui', 20],
            ['Trujillo', 21],
            ['La Guaira', 22],
            ['San Felipe', 23],
            ['Maracaibo', 24],
            ['Gran Roque', 25]
        ];

        foreach ($inserts as $insert){
            Localidad::create(array('nombre' => $insert[0], 'localidad_id' => $insert[1]));
        }
    }
}
