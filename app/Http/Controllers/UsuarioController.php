<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;
use App\Admin;
use App\Representante;

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
        Auth::logout();
        Usuario::where('id',$user->id)->delete();
        if($user->rol_type == 'App\Admin'){
            Admin::where('id',$user->rol_id)->delete();
        }else{
            Representante::where('id',$user->rol_id)->delete();
        }
        return redirect()->route('inicio');
    }
}
