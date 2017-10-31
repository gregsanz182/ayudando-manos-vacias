<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            'confirmar_contrasena' => 'required|same:contrasena',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:representante',
            'fecha_nacimiento' => 'required|date_format:d-m-Y',
            'telefono' => 'required|size:11',
            'direccion' => 'required',
            'municipio' => 'required|exists:localidad,id',
            'genero' => 'required'
        ]);

        $usuario = new Usuario;
        $representante = new Representante;

        $representante->nombre = $request['nombre'];
        $representante->apellido = $request['apellido'];
        $representante->cedula = $request['cedula'];
        $representante->fecha_nacimiento = $request['fecha_nacimiento'];
        $representante->telefono = $request['telefono'];
        $representante->direccion = $request['direccion'];
        $representante->localidad_id = $request['municipio'];
        $representante->genero = $request['genero']==1?'M':'F';

        $representante->save();

        $usuario->usuario = $request['usuario'];
        $usuario->correo = $request['correo'];
        $usuario->contrasena = bcrypt($request['contrasena']);
        $usuario->rol_id = $representante->id;
        $usuario->rol_type = 'App\Representante';
        $usuario->estado_cuenta = 1;

        $usuario->save();

        Auth::login($usuario);

        return redirect()->back();
    }
}
