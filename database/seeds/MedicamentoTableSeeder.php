<?php

use Illuminate\Database\Seeder;
use App\Medicamento;

class MedicamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inserts = [
            ['Citarabina', 'Antimetabolito'],
            ['Cisplatino', 'Agente Genotóxico'],
            ['Alemtuzumab', 'Anticuerpo'],
            ['Ibritumomab', 'Anticuerpo'],
            ['Asparaginasa', 'Activador de Enzima'],
            ['Bortezomib', 'Inhibidor de Proteosoma'],
            ['Doxorubicina', 'Agente Genotóxico'],
            ['Melfalan', 'Agente Genotóxico'],
            ['Vindesina', 'Inhibidor del Huso'],
            ['Topotecan', 'Agente Genotóxico'],
            ['Letrozol', 'Inhibidor de Aromatasa'],
            ['Rituximab', 'Anticuerpo'],
            ['Denileukin Diftitox', 'Medicamento qie afecta un receptor molecular'],
            ['Bortezomib', 'Inhibidor de Proteosoma']
        ];

        foreach ($inserts as $insert){
            Medicamento::create(array('nombre' => $insert[0], 'descripcion' => $insert[1]));
        }
    }
}
