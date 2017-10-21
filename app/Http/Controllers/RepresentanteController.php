<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nino;

class RepresentanteController extends Controller
{
    public function datos(){
        $ninos = Nino::where('representante_id',Auth::user()->id)->get();
    }
}
