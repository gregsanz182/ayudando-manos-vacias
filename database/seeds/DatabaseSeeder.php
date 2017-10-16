<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CancerTableSeeder::class);
        $this->call(LocalidadTableSeeder::class);
        $this->call(MedicamentoTableSeeder::class);
        $this->call(Categoria_InsumoTableSeeder::class);
        $this->call(RepresentanteTableSeeder::class);
        $this->call(NinoTableSeeder::class);
        $this->call(MensajeTableSeeder::class);
        $this->call(Nino_CancerTableSeeder::class);
    }
}
