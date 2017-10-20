<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Nino_Medicamento;
use App\Nino_Insumo;

class RequerimientoController extends Controller
{
    public function gestionRequerimientos($nino_id)
    {
        $medicamentos = Nino_Medicamento::where('nino_id', $nino_id)->orderBy('created_at', 'DESC')->paginate(10);
        $insumos = Nino_Insumo::where('nino_id', $nino_id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('ges_requerimientos', ['medicamentos' => $medicamentos, 'insumos' => $insumos]);
    }
}
