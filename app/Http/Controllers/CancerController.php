<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Ocidb;
use App\motorData as MOTOR;
use Illuminate\Http\Request;
use App\Cancer;

class CancerController extends Controller
{
    public function insertar(Request $request){

        $cancer = new Cancer;

        $cancer->nombre = $request->input('tipo_c');
        $cancer->descripcion = $request->input('desc_c');

        $cancer->save();
        
        return redirect('/admin');
    }
}