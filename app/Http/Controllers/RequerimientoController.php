<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Nino_Medicamento;

class RequerimientoController extends Controller
{
    public function gestionRequerimientos($nino_id)
    {
        $meds = Nino_Medicamento::where('nino_id', $nino_id)->orderBy('created_at')->get();
        return view('ges_requerimientos', ['meds' => $meds]);
    }
}
