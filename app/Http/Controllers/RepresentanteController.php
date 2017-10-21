<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Localidad;

class RepresentanteController extends Controller
{
    public function datos(){
        $repre = Auth::user();
        $estados = Localidad::whereNull('localidad_id')->orderBy('nombre')->get();
        $municipios = Localidad::all();
        return view('actualizar_representante', ['repre' => $repre, 'estados' => $estados, 'municipios' => $municipios]);
    }
    public function actualizar(Request $request){
        $this->validate($request, [
            'usuario' => 'required|unique:usuario',
            'correo' => 'required|email',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:representante',
            'fecha_nacimiento' => 'required|date_format:d-m-Y',
            'telefono' => 'required',
            'direccion' => 'required',
            'municipio' => 'required|exists:localidad,id',
            'genero' => 'required'
        ]);

        $usuario = Auth::user();

        if($request->has('contrasena')){
            $this->validate($request, [
                'contrasena' => 'min:4',
                'confirmar_contrasena' => 'required|same:contrasena'
            ]);
            $usuario->contrasena = bcrypt($request['contrasena']);
        }
        $usuario->usuario = $request['usuario'];
        $usuario->correo = $request['correo'];
        $usuario->rol->nombre = $request['nombre'];
        $usuario->rol->apellido = $request['apellido'];
        $usuario->rol->cedula = $request['cedula'];
        $usuario->rol->fecha_nacimiento = $request['fecha_nacimiento'];
        $usuario->rol->genero = $request['genero']==1?'M':'F';
        $usuario->rol->telefono = $request['telefono'];
        $usuario->rol->direccion = $request['direccion'];
        $usuario->rol->localidad_id = $request['municipio'];
        $usuario->save();

        return redirect()->route('ver-perfil');
    }
}
