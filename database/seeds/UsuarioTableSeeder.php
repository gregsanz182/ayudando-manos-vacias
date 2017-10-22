<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create(['usuario' => 'admin', 'contrasena' => bcrypt('admin'), 'correo' => 'admin@admin.com', 'rol_type' => 'App\Admin', 'rol_id' => 1, 'estado_cuenta' => 1]);
        Usuario::create(['usuario' => 'repr', 'contrasena' => bcrypt('repr'), 'correo' => 'iker@gmail.com', 'rol_type' => 'App\Representante', 'rol_id' => 6, 'estado_cuenta' => 1]);
    }
}
