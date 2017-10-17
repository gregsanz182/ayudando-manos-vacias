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
    Route::get('/admin', function () {
        return view('admin');
    });
});

Route::middleware(['es_representante'])->group(function(){
    Route::get('/registrar_nino', function () {
        return view('registrar_nino');
    });

    Route::get('/actualizar_datos', function () {
        return view('actualizar_datos');
    });
});

Route::post('/ingresar', 'UsuarioController@ingresarUsuario')->name('ingresar');

Route::get('/salir', 'UsuarioController@salirUsuario')->name('salir');

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/buscar', function () {
    return view('buscar_nino');
});

Route::get('/perfil_rep', function () {
    return view('perfil_representante');
});

Route::get('/registrar_rep', function () {
    return view('registrarse');
});

Route::get('/probar', ['uses' => 'Prueba@test', 'middleware' => 'es_representante']);


