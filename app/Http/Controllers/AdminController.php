<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Ocidb;
use App\motorData as MOTOR;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function tipocancernuevo($request){
        $tipo = $request->input('tipo_c');
        $desc = $request->input('desc_c');

        $query = "insert into CANCER (tipo,desc) values('".$tipo."','".$desc."')";


    }
}