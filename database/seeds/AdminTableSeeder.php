<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Usuario;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(['nombre' => 'Gregory Sánchez']);
        Usuario::create(['usuario' => 'admin', 'contrasena' => bcrypt('admin'), 'correo' => 'admin@admin.com', 'rol_type' => 'App\Admin', 'rol_id' => 1]);
    }
}
