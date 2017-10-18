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

    public function registrar(Request $request)
    {
        $this->validate($request, [
            'usuario' => 'required|unique:usuario',
            'correo' => 'required|email',
            'contrasena' => 'required|min:4',
            'confirmar_contrasena' => 'required|same:confirmar_contrasena',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:representante',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required',
            'direccion' => 'required',
            'municipio' => 'required|exists:localidad,id'
        ]);

        return redirect()->back();
    }
}
