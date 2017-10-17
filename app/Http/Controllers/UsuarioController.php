<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Usuario;

class UsuarioController extends Controller
{
    public function ingresarUsuario(Request $request) {
        Auth::attempt(['usuario' => $request['log-user-input'], 'password' => $request['log-pass-input']]);
        return redirect()->back();
    }

    public function salirUsuario() {
        Auth::logout();
        return redirect()->route('inicio');
    }
}
