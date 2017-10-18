<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Localidad;
use App\Representante;

class RegistroController extends Controller
{
    public function formulario()
    {
        $estados = Localidad::whereNull('localidad_id')->orderBy('nombre')->get();
        return view('registro_form', ['estados' => $estados]);
    }
}
