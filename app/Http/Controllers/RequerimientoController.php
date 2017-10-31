<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Nino;
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
            'nino_id' => $nino_id,
            'nino_medicamentos' => $nino_medicamentos, 
            'nino_insumos' => $nino_insumos,
            'medicamentos' => $medicamentos,
            'insumos_cat' => $insumos_cat
        ]);
    }

    public function agregarMedicamento($nino_id, Request $request)
    {
        $nino_medicamento = new Nino_Medicamento;

        $nino_medicamento->id = Nino_Medicamento::getNextId();
        $nino_medicamento->fecha = $request['fecha'];
        $nino_medicamento->medicamento_id = $request['medicamento'];
        $nino_medicamento->cantidad = $request['cantidad'];
        if($request->has('otro_medicamento'))
            $nino_medicamento->nombre_otro = $request['otro_medicamento'];
        $nino_medicamento->estado_requerimiento = 'Requerido';
        $nino_medicamento->nino_id = $nino_id;

        $nino_medicamento->save();

        return redirect()->back();
    }

    public function agregarInsumo($nino_id, Request $request)
    {
        $nino_insumo = new Nino_Insumo;

        $nino_insumo->id = Nino_Insumo::getNextId();
        $nino_insumo->nombre = $request['insumo'];
        $nino_insumo->fecha = $request->fecha;
        $nino_insumo->categoria_insumo_id = $request['categoria_insumo'];
        $nino_insumo->cantidad = $request['cantidad'];
        if($request->has('motivo'))
            $nino_insumo->motivo = $request['motivo'];
        $nino_insumo->estado_requerimiento = 'Requerido';
        $nino_insumo->nino_id = $nino_id;

        $nino_insumo->save();

        return redirect()->back();
    }

    public function modificarMedicamento($nino_id, $id, $medicamento_id, Request $request) 
    {
        $insert = [
            'fecha' => $request['fecha'],
            'medicamento_id' => $request['medicamento'],
            'cantidad' => $request['cantidad']
        ];
        if($request->has('dosis'))
            $insert['dosis'] = $request['dosis'];
        if($request->has('otro_medicamento'))
            $insert['nombre_otro'] = $request['otro_medicamento'];
        if($request->has('donado'))
            $insert['estado_requerimiento'] = 'Donado';
        Nino_Medicamento::where('nino_id', $nino_id)
                        ->where('medicamento_id', $medicamento_id)
                        ->where('id', $id)
                        ->update($insert);

        return redirect()->back();
    }

    public function modificarInsumo($nino_id, $id, $categoria_insumo_id, Request $request) 
    {
        $insert = [
            'fecha' => $request['fecha'],
            'categoria_insumo_id' => $request['categoria_insumo'],
            'nombre' => $request['insumo'],
            'cantidad' => $request['cantidad']
        ];
        if($request->has('motivo'))
            $insert['motivo'] = $request['motivo'];
        if($request->has('donado'))
            $insert['estado_requerimiento'] = 'Donado';
        Nino_Insumo::where('nino_id', $nino_id)
                        ->where('categoria_insumo_id', $categoria_insumo_id)
                        ->where('id', $id)
                        ->update($insert);

        return redirect()->back();
    }

    public function eliminarMedicamento($nino_id, $id, $medicamento_id)
    {
        Nino_Medicamento::where('nino_id', $nino_id)
                        ->where('medicamento_id', $medicamento_id)
                        ->where('id', $id)
                        ->delete();
        
        return redirect()->back();
    }

    public function eliminarInsumo($nino_id, $id, $categoria_insumo_id)
    {
        Nino_Insumo::where('nino_id', $nino_id)
                        ->where('categoria_insumo_id', $categoria_insumo_id)
                        ->where('id', $id)
                        ->delete();
        
        return redirect()->back();
    }
}
