<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Ocidb;
use App\motorData as MOTOR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cancer;
use App\Categoria_Insumo;
use App\Medicamento;
use App\Localidad;
use App\Usuario;
use App\Admin;


class AdminController extends Controller
{

    public function obtener_nombre_estados(){
        $admin = Admin::find(Auth::user()->rol_id);

        $localidad = Localidad::where('localidad_id',null)->get();

        return view('admin', ['nombre' => $admin->nombre, 'estados' => $localidad]);
    }

    public function actualizar_perfil(Request $request){

        $this->validate($request, [
            'nombre' => 'required',
            'correo' => 'required|email'
        ]);

        $usuario = Usuario::find(Auth::user()->usuario);

        $usuario->correo = $request->input('correo');

        if($request->input('contrasena1') != NULL){
            $this->validate($request, [
                'contrasena1' => 'required|min:4',
                'contrasena2' => 'required|same:contrasena1'
            ]);
            $usuario->contrasena = bcrypt($request->input('contrasena1'));
        }

        $usuario->rol->nombre = $request->input('nombre');

        $usuario->save();

        return redirect()->route('admin');
    }

    public function guardar_tipo_cancer(Request $request){

        $this->validate($request, [
            'tipo' => 'required',
            'desc' => 'required'
        ]);
        $cancer = new Cancer;

        $cancer->nombre = $request->input('tipo');
        $cancer->descripcion = $request->input('desc');

        $cancer->save();
        
        return redirect()->route('admin');
    }

    public function guardar_medicamento(Request $request){
        
        $this->validate($request, [
            'nombre' => 'required',
            'desc' => 'required'
        ]);
        $medicamento = new Medicamento;

        $medicamento->nombre = $request->input('nombre');
        $medicamento->descripcion = $request->input('desc');

        $medicamento->save();

        return redirect()->route('admin');
    }

    public function guardar_categoria_insumo(Request $request){

        $this->validate($request, [
            'categoria' => 'required'
        ]);

        $insumo = new Categoria_Insumo;

        $insumo->nombre = $request->input('categoria');

        $insumo->save();

        return redirect()->route('admin');
    }

    public function guardar_localidad(Request $request){

        $this->validate($request, [
            'nombre' => 'required',
            'localidad_id' => 'nullable'
        ]);

        $localidad = new Localidad;

        $localidad->nombre = $request->input('nombre');

        if($request->input('localidad_id') != 'NULL'){
            $localidad->localidad_id = $request->input('localidad_id');
        }
        
        $localidad->save();

        return redirect()->route('admin');
    }

    public function guardar_admin(Request $request){

        $this->validate($request, [
            'nombre' => 'required',
            'usuario' => 'required|unique:usuario',
            'correo' => 'required|email',
            'contrasena1' => 'required|min:4',
            'contrasena2' => 'required|same:contrasena1'
        ]);

        $usuario = new Usuario;
        $admin = new Admin;
        
        $admin->nombre = $request->input('nombre');

        $admin->save();

        $usuario->usuario = $request->input('usuario');
        $usuario->correo = $request->input('correo');
        $usuario->contrasena = bcrypt($request->input('contrasena1'));
        $usuario->rol_id = $admin->id;
        $usuario->rol_type = 'App\Admin';
        
        $usuario->save();

        return redirect()->route('admin');
    }
}