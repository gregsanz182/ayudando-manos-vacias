<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Localidad;
use App\Representante;
use App\Mensaje;

class RepresentanteController extends Controller
{
    public function datos(){
        $repre = Auth::user();
        $estados = Localidad::whereNull('localidad_id')->orderBy('nombre')->get();
        $municipios = Localidad::all();
        return view('actualizar_representante', ['repre' => $repre, 'estados' => $estados, 'municipios' => $municipios]);
    }
    public function actualizar(Request $request){

        $usuario = Auth::user();

        if($request->has('contrasena')){
            $this->validate($request, [
                'contrasena' => 'nullable|min:4',
                'confirmar_contrasena' => 'same:contrasena'
            ]);
            $usuario->contrasena = bcrypt($request['contrasena']);
        }
        $usuario->usuario = $request['usuario'];
        $usuario->correo = $request['correo'];
        $usuario->save();
        
        $representante = $usuario->rol;
        $representante->nombre = $request['nombre'];
        $representante->apellido = $request['apellido'];
        $representante->cedula = $request['cedula'];
        $representante->fecha_nacimiento = $request['fecha_nacimiento'];
        $representante->genero = $request['genero']==1?'M':'F';
        $representante->telefono = $request['telefono'];
        $representante->direccion = $request['direccion'];
        $representante->localidad_id = $request['municipio'];
        $representante->save();

        return redirect()->route('ver-perfil');
    }

    public function info_rep($id){
        $rep = Representante::find($id);
        if(!$rep){
            return redirect()->back();
        }
        $ban = true;
        if($id == Auth::user()->rol_id && Auth::user()->rol_type == 'App\Representante'){
            $ban = false;
        }
        return view('informacion_representante', ['rep' => $rep, 'ban' => $ban]);
    }

    public function mensajes($rep_id){
        $mensajes = Mensaje::whereHas(
            'nino', function($query) use ($rep_id){
                $query->where('representante_id',$rep_id);
            }
        )->paginate(5);

        return view('bandeja_mensajes', ['mensajes' => $mensajes]);
    }
}
