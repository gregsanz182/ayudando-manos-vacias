<?php

use Illuminate\Database\Seeder;
use App\Categoria_Insumo;

class Categoria_InsumoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = [
            ["Alimentos"],
            ["Pañales"],
            ["Material Médico"],
            ["Agujas e inyectadoras"],
            ["Sabanas, Fundas, Ropa"],
            ["Algodon"],
            ["Material Aséptico"]
        ];

        foreach ($inserts as $insert){
            Categoria_Insumo::create(array('nombre' => $insert[0]));
        }
    }
}
