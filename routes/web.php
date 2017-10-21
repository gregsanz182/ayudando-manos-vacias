<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('inicio');

Route::middleware(['es_admin'])->group(function(){

    Route::get('/admin', 'AdminController@obtener_nombre_estados')->name('admin');

    Route::post('/admin/actualizar-perfil', 'AdminController@actualizar_perfil')->name('actualizar-perfil');

    Route::post('/admin/guardar-tipo-cancer', 'AdminController@guardar_tipo_cancer')->name('guardar-tipo-cancer');

    Route::post('/admin/actualizar-tipo-cancer', 'AdminController@actualizar_tipo_cancer')->name('actualizar-tipo-cancer');

    Route::post('/admin/guardar-categoria-insumo', 'AdminController@guardar_categoria_insumo')->name('guardar-categoria-insumo');

    Route::post('/admin/actualizar-insumo', 'AdminController@actualizar_insumo')->name('actualizar-insumo');

    Route::post('/admin/guardar-medicamento', 'AdminController@guardar_medicamento')->name('guardar-medicamento');

    Route::post('/admin/actualizar-medicamento', 'AdminController@actualizar_medicamento')->name('actualizar-medicamento');

    Route::post('/admin/guardar-localidad', 'AdminController@guardar_localidad')->name('guardar-localidad');
    
    Route::post('/admin/actualizar-localidad', 'AdminController@actualizar_localidad')->name('actualizar-localidad');

    Route::post('/admin/guardar-admin', 'AdminController@guardar_admin')->name('guardar-admin');

});

Route::middleware(['es_representante'])->group(function(){

    Route::get('/ver_perfil', 'RepresentanteController@datos')->name('ver-perfil');

    Route::post('/actualizar_perfil', 'RequestController@actualizar')->name('actualizar-perfil');
    
    Route::get('/registro_nino', 'NinoController@registroNino')->name('registro_nino');

    Route::post('/registrar_nino', 'NinoController@registrarNino')->name('registrar_nino');

    Route::get('/gestion_requerimientos/{nino_id}',[
        'uses' => 'RequerimientoController@gestionRequerimientos',
        'middleware' => 'nino_repr_valido'
    ])->name('gestion_requerimientos');

    Route::post('/agregar_medicamento/{nino_id}',[
        'uses' => 'RequerimientoController@agregarMedicamento',
        'middleware' => 'nino_repr_valido'
    ])->name('agregar_medicamento');

    Route::post('/modificar_medicamento/{nino_id}/{id}/{medicamento_id}',[
        'uses' => 'RequerimientoController@modificarMedicamento',
        'middleware' => 'nino_repr_valido'
    ])->name('modificar_medicamento');

    Route::post('/agregar_insumo/{nino_id}',[
        'uses' => 'RequerimientoController@agregarInsumo',
        'middleware' => 'nino_repr_valido'
    ])->name('agregar_insumo');

    Route::post('/modificar_insumo/{nino_id}/{id}/{categoria_insumo_id}',[
        'uses' => 'RequerimientoController@modificarinsumo',
        'middleware' => 'nino_repr_valido'
    ])->name('modificar_insumo');
});

Route::post('/get_ciudades', 'LocalidadController@obtenerCiudades')->name('obtener_ciudades');

Route::middleware(['es_invitado'])->group(function(){
    Route::get('/registro_rep', 'RegistroController@formulario')->name('registro');
    
    Route::post('/registrar_rep', 'RegistroController@registrar')->name('registrar');
});

Route::post('/ingresar', 'UsuarioController@ingresarUsuario')->name('ingresar');

Route::get('/salir', 'UsuarioController@salirUsuario')->name('salir');

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/buscar', 'NinoController@buscarNinos')->name('buscar');

Route::get('/probar', ['uses' => 'Prueba@test', 'middleware' => 'es_representante']);


