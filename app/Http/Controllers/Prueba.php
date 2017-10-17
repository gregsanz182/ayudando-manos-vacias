<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mensaje;
use App\Usuario;

class Prueba extends Controller
{
    public function test()
    {
        $mensajes = Mensaje::all();
        $usuario = Usuario::all();
        $value = false;
        return view('testView', ['mensajes' => $mensajes, 'usuario' => $usuario, 'value' => $value]);
    }
}
