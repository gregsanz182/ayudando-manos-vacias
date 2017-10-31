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
        $bitacora->usuario_admin_id = Auth::user()->rol->id;
        $bitacora->usuario_representante_id = Auth::user()->rol->id;
        $bitacora->fecha = Carbon::now('America/Caracas');

        Auth::logout();
        Usuario::where('id',$user->id)->delete();
        if($user->rol_type == 'App\Admin'){
            Admin::where('id',$user->rol_id)->delete();
            $bitacora->tabla = "admin";
            $bitacora->usuario_representante_id = null;
        }else{
            Representante::where('id',$user->rol_id)->delete();
            $bitacora->tabla = "representante";
            $bitacora->usuario_admin_id = null;
        }
        
        $bitacora->save();

        return redirect()->route('inicio');
    }
}
