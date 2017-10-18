<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Ocidb;
use App\motorData as MOTOR;
use Illuminate\Http\Request;
use App\Cancer;
use App\Categoria_Insumo;
use App\Medicamento;
use App\Localidad;


class AdminController extends Controller
{
    public function guardar_tipo_cancer(Request $request){

        $cancer = new Cancer;

        $cancer->nombre = $request->input('tipo_c');
        $cancer->descripcion = $request->input('desc_c');

        $cancer->save();
        
        return redirect()->route('admin');
    }

    public function guardar_medicamento(Request $request){
        
        $medicamento = new Medicamento;

        $medicamento->nombre = $request->input('nombre_m');
        $medicamento->descripcion = $request->input('desc_m');

        $medicamento->save();

        return redirect()->route('admin');
    }

    public function guardar_categoria_insumo(Request $request){

        $insumo = new Categoria_Insumo;

        $insumo->nombre = $request->input('categoria_i');

        $insumo->save();

        return redirect()->route('admin');
    }

    public function guardar_localidad(Request $request){

        $localidad = new Localidad;

        $localidad->nombre = $request->input('nombre_l');
        

        $localidad->save();

        return redirect()->route('admin');
    }
}