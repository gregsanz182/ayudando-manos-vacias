<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Nino_Medicamento;
use App\Nino_Insumo;
use App\Medicamento;
use App\Categoria_Insumo;

class RequerimientoController extends Controller
{
    public function gestionRequerimientos($nino_id)
    {
        $medicamentos = Medicamento::orderBy('nombre')->get();
        $insumos_cat = Categoria_Insumo::orderBy('nombre')->get();
        $nino_medicamentos = Nino_Medicamento::where('nino_id', $nino_id)->orderBy('created_at', 'DESC')->paginate(10);
        $nino_insumos = Nino_Insumo::where('nino_id', $nino_id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('ges_requerimientos', [
            'nino_medicamentos' => $nino_medicamentos, 
            'nino_insumos' => $nino_insumos,
            'medicamentos' => $medicamentos,
            'insumos_cat' => $insumos_cat
        ]);
    }
}
