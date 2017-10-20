<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequerimientoController extends Controller
{
    public function gestionRequerimientos()
    {
        return view('ges_requerimientos');
    }
}
