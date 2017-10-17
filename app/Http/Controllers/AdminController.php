<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Ocidb;
use App\motorData as MOTOR;
use Illuminate\Http\Request;
use App\Cancer;

class AdminController extends Controller
{
    public function tipocancernuevo($request){

        $cancer = new Cancer;

        $cancer->id = increment();
        $cancer->nombre = $request->input('tipo_c');
        $cancer->descripcion = $request->input('desc_c');

        $cancer->save();
        
        return view('admin');
    }
}