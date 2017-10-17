<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidad;

class LocalidadController extends Controller
{
    function obtenerCiudades(Request $request)
    {
        $estado_id = $request['estado_id'];
        $ciudades = Localidad::select(['id', 'nombre'])->where('localidad_id', $estado_id)->orderBy('nombre')->get();
        return response()->json($ciudades);
    }
}
