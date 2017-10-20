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
    public function buscarNinos(Request $request)
    {
        $ninos = Nino::with([
            'medicamentos' => function($query){
                $query->where('estado_requerimiento', 'Requerido');
            },
            'insumos' => function($query){
                $query->where('estado_requerimiento', 'Requerido');
            }])->whereHas('medicamentos', function($query){
                $query->where('estado_requerimiento', 'Requerido');
            })->whereHas('insumos', function($query){
                $query->where('estado_requerimiento', 'Requerido');
            })->whereHas('canceres', function($query) use ($request){
                if($request->exists('cancer') && $request['cancer'])
                    $query->where('cancer_id', $request['cancer']);
            })->whereHas('medicamentos', function($query) use ($request){
                if($request->exists('medicamentos') && $request['medicamentos'])
                    $query->where('medicamento_id', $request['medicamentos'])->where('estado_requerimiento', 'Requerido');
            })->whereHas('insumos', function($query) use ($request){
                if($request->exists('insumos') && $request['insumos'])
                    $query->where('categoria_insumo_id', $request['insumos'])->where('estado_requerimiento', 'Requerido');
            })->whereHas('representante.localidad', function($query) use ($request){
                if($request->exists('estado') && $request['estado'] != 'Estado')
                    $query->where('localidad_id', $request['estado']);
                if($request->exists('municipio') && $request['municipio'] != 'Municipio')
                    $query->where('id', $request['municipio']);
            })->paginate(10);
        $estados = Localidad::whereNull('localidad_id')->orderBy('nombre')->get();
        $municipios = [];
        if($request['estado'])
        {
            $municipios = Localidad::where('localidad_id', $request['estado'])->orderBy('nombre')->get();
        }
        $canceres = Cancer::orderBy('nombre')->get();
        $medicamentos = Medicamento::orderBy('nombre')->get();
        $insumos_cat = Categoria_Insumo::orderBy('nombre')->get();
        return view('buscar_nino', [
            'ninos' => $ninos, 
            'estados' => $estados, 
            'municipios' => $municipios, 
            'canceres' => $canceres, 
            'medicamentos' => $medicamentos, 
            'insumos_cat' => $insumos_cat, 
            'old' => $request
        ]);
    }

    public function registroNino()
    {
        $canceres = Cancer::orderBy('nombre')->get();
        return view('registro_nino', ['canceres' => $canceres, 'relacionesRepr' => Nino::$relacionesRepr]);
    }

    public function registrarNino()
    {
        
    }
}
