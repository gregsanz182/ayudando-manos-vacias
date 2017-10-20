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
use App\Bitacora;


class AdminController extends Controller
{

    public function obtener_nombre_estados(){
        $admin = Auth::user()->rol;

        $localidad = Localidad::where('localidad_id',null)->get();

        return view('admin', ['nombre' => $admin->nombre, 'estados' => $localidad]);
    }

    public function actualizar_perfil(Request $request){

        $this->validate($request, [
            'nombre_p' => 'required',
            'correo_p' => 'required|email'
        ]);

        $usuario = Auth::user();

        $usuario->correo = $request->input('correo_p');

        if($request->has('contrasena1_p')){
            $this->validate($request, [
                'contrasena1_p' => 'min:4',
                'contrasena2_p' => 'required|same:contrasena1_p'
            ]);
            $usuario->contrasena = bcrypt($request->input('contrasena1_p'));
        }

        $usuario->rol->nombre = $request->input('nombre_p');

        $usuario->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "actualizar";
        $bitacora->tabla = "usuario";
        $bitacora->usuario_id = $usuario->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function guardar_tipo_cancer(Request $request){

        $this->validate($request, [
            'tipo_c' => 'required',
            'desc_c' => 'required'
        ]);
        $cancer = new Cancer;

        $cancer->nombre = $request->input('tipo_c');
        $cancer->descripcion = $request->input('desc_c');

        $cancer->save();
        
        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "cancer";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function guardar_medicamento(Request $request){
        
        $this->validate($request, [
            'nombre_m' => 'required',
            'desc_m' => 'required'
        ]);
        $medicamento = new Medicamento;

        $medicamento->nombre = $request->input('nombre_m');
        $medicamento->descripcion = $request->input('desc_m');

        $medicamento->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "medicamento";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function guardar_categoria_insumo(Request $request){

        $this->validate($request, [
            'categoria' => 'required'
        ]);

        $insumo = new Categoria_Insumo;

        $insumo->nombre = $request->input('categoria');

        $insumo->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "categoria_insumo";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function guardar_localidad(Request $request){

        $this->validate($request, [
            'nombre_l' => 'required'
        ]);

        $localidad = new Localidad;

        $localidad->nombre = $request->input('nombre_l');

        if($request->input('localidad_id') != 'NULL'){
            $this->validate($request, [
                'localidad_id' => 'different:0'
            ]);
            $localidad->localidad_id = $request->input('localidad_id');
        }
        
        $localidad->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "localidad";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function guardar_admin(Request $request){

        $this->validate($request, [
            'nombre_n' => 'required',
            'usuario_n' => 'required|unique:usuario',
            'correo_n' => 'required|email',
            'contrasena1_n' => 'required|min:4',
            'contrasena2_n' => 'required|same:contrasena1_n'
        ]);

        $usuario = new Usuario;
        $admin = new Admin;
        
        $admin->nombre = $request->input('nombre_n');

        $admin->save();

        $usuario->usuario = $request->input('usuario_n');
        $usuario->correo = $request->input('correo_n');
        $usuario->contrasena = bcrypt($request->input('contrasena1_n'));
        $usuario->rol_id = $admin->id;
        $usuario->rol_type = 'App\Admin';
        
        $usuario->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "admin";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();
        
        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "usuario";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }
}