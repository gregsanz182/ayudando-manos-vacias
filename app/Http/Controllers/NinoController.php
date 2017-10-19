<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nino;
use App\Localidad;
use App\Cancer;
use App\Medicamento;
use App\Categoria_Insumo;

class NinoController extends Controller
{
    public function buscarNinos()
    {
        $ninos = Nino::paginate(10);
        $estados = Localidad::whereNull('localidad_id')->orderBy('nombre')->get();
        $canceres = Cancer::orderBy('nombre')->get();
        $medicamentos = Medicamento::orderBy('nombre')->get();
        $insumos_cat = Categoria_Insumo::orderBy('nombre')->get();
        return view('buscar_nino', ['ninos' => $ninos, 'estados' => $estados, 'canceres' => $canceres, 'medicamentos' => $medicamentos, 'insumos_cat' => $insumos_cat]);
    }
}
