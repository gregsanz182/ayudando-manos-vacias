<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ocidb;
use App\motorData as MOTOR;
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

        $estado = Localidad::where('localidad_id',null)->get();

        $cancer = Cancer::all();
        $insumo = Categoria_Insumo::all();
        $medicamento = Medicamento::all();
        $localidad = Localidad::all();

        return view('admin', ['nombre' => $admin->nombre, 'estados' => $estado, 'tipos' => $cancer, 'insumos' => $insumo, 'medicamentos' => $medicamento, 'localidades' => $localidad]);
    }

    public function actualizar_perfil(Request $request){

        $usuario = Auth::user();

        $usuario->correo = $request['correo_p'];

        if($request->has('contrasena_p')){
            $this->validate($request, [
                'contrasena_p' => 'min:4',
                'confirmar_contrasena_p' => 'required|same:contrasena_p'
            ]);
            $usuario->contrasena = bcrypt($request['contrasena_p']);
        }

        $usuario->rol->nombre = $request['nombre_p'];

        $usuario->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "actualizar";
        $bitacora->tabla = "usuario";
        $bitacora->usuario_id = $usuario->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function guardar_tipo_cancer(Request $request){

        $cancer = new Cancer;

        $cancer->nombre = $request['tipo_c'];
        $cancer->descripcion = $request['desc_c'];

        $cancer->save();
        
        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "cancer";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function actualizar_tipo_cancer(Request $request){

        if( $request['select_cancer'] != '0'){
            $id = $request['select_cancer'];
            $cancer = Cancer::find($id);
            if( $request->has('tipo_c_a') ){
                $cancer->nombre = $request['tipo_c_a'];
            }
            if( $request->has('desc_c_a') ){
                $cancer->descripcion = $request['desc_c_a'];
            }
            $cancer->save();
        }

        return redirect()->route('admin');
    }

    public function guardar_medicamento(Request $request){
        
        $this->validate($request, [
            'nombre_m' => 'required',
            'desc_m' => 'required'
        ]);
        $medicamento = new Medicamento;

        $medicamento->nombre = $request['nombre_m'];
        $medicamento->descripcion = $request['desc_m'];

        $medicamento->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "medicamento";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->view('admin');
    }

    public function actualizar_medicamento(Request $request){

        if($request['select_medicamento'] != '0'){
            $id = $request['select_medicamento'];
            $medicamento = Medicamento::find($id);
            if( $request->has('nombre_m_a') ){
                $medicamento->nombre = $request['nombre_m_a'];
            }
            if( $request->has('desc_m_a') ){
                $medicamento->descripcion = $request['desc_m_a'];
            }
            $medicamento->save();
        }

        return redirect()->route('admin');
    }
        
    public function guardar_categoria_insumo(Request $request){

        $this->validate($request, [
            'categoria' => 'required'
        ]);

        $insumo = new Categoria_Insumo;

        $insumo->nombre = $request['categoria'];

        $insumo->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "categoria_insumo";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function actualizar_insumo(Request $request){

        if($request['select_insumo'] != '0'){
            $id = $request['select_insumo'];
            $insumo = Categoria_Insumo::find($id);
            if ($request->has('nombre_i_a') ){
                $insumo->nombre = $request['nombre_i_a'];
            }
            $insumo->save();
        }

        return redirect()->route('admin');
    }

    public function guardar_localidad(Request $request){

        $this->validate($request, [
            'nombre_l' => 'required'
        ]);

        $localidad = new Localidad;

        $localidad->nombre = $request['nombre_l'];

        if($request['localidad_id'] != 'NULL'){
            $this->validate($request, [
                'localidad_id' => 'different:0'
            ]);
            $localidad->localidad_id = $request['localidad_id'];
        }
        
        $localidad->save();

        $bitacora = new Bitacora;
        $bitacora->accion = "insertar";
        $bitacora->tabla = "localidad";
        $bitacora->usuario_id = Auth::user()->id;
        $bitacora->save();

        return redirect()->route('admin');
    }

    public function actualizar_localidad(Request $request){
        if($request['select_localidad'] != '0'){
            $id = $request['select_localidad'];
            $localidad = Localidad::find( $id);
            if( $request->has('nombre_l_a') ){
                $localidad->nombre = $request['nombre_l_a'];
            }
            if( $request->has('estado_l_a') ){
                $localidad->localidad_id = $request['estado_l_a'];
            }
            $localidad->save();
        }

        return redirect()->route('admin');
    }

    public function guardar_admin(Request $request){

        $this->validate($request, [
            'usuario_n' => 'unique:usuario,usuario',
            'contrasena_n' => 'min:4',
            'confirmar_contrasena_n' => 'same:contrasena_n'
        ]);

        $usuario = new Usuario;
        $admin = new Admin;
        
        $admin->nombre = $request['nombre_n'];

        $admin->save();

        $usuario->usuario = $request['usuario_n'];
        $usuario->correo = $request['correo_n'];
        $usuario->contrasena = bcrypt($request['contrasena_n']);
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