<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Admin;
use App\Representante;
use App\Bitacora;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function ingresarUsuario(Request $request) {
        Auth::attempt(['usuario' => $request['log-user-input'], 'password' => $request['log-pass-input']]);
        return redirect()->back();
    }

    public function registrarUsuario(Request $request) {
        
    }

    public function salirUsuario() {
        Auth::logout();
        return redirect()->route('inicio');
    }

    public function desactivarUsuario(){
        $user = Auth::user();

        $bitacora = new Bitacora;
        $bitacora->accion = "eliminar";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->fecha = Carbon::now('America/Caracas');
        
        Auth::logout();
        Usuario::where('id',$user->id)->delete();
        if($user->rol_type == 'App\Admin'){
            $bitacora->tabla = "usuario";
            $bit = new Bitacora;
            $bit->accion = "eliminar";
            $bit->usuario_id = $user->id;
            $bit->fecha = Carbon::now('America/Caracas');
            $bit->tabla = "admin";
            Admin::where('id',$user->rol_id)->delete();
        }else{
            $bitacora->tabla = "representante";
            $bit = new Bitacora;
            $bit->accion = "eliminar";
            $bit->usuario_id = $user->id;
            $bit->fecha = Carbon::now('America/Caracas');
            $bit->tabla = "representante";
            Representante::where('id',$user->rol_id)->delete();
        }
        
        $bitacora->save();
        $bit->save();

        return redirect()->route('inicio');
    }
}
