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
});

Route::get('/ayuda', function () {
    return view('ayuda');
});

Route::get('/buscar', function () {
    return view('buscar_nino');
});

Route::get('/perfil_rep', function () {
    return view('perfil_representante');
});

Route::get('/registrar_nino', function () {
    return view('registrar_nino');
});

Route::get('/registrar_rep', function () {
    return view('registrarse');
});

Route::get('/actualizar_datos', function () {
    return view('actualizar_datos');
});

Route::get('/sss', function () {
    return view('index');
});

Route::get('/probar', 'Prueba@test');