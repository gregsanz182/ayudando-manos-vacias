@extends('layouts.master')

@section('contenido')
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Encuentra niños que puedan necesitar tu ayuda.</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="row form-group">
                <label for="tipo">Tipo de Cáncer</label>
                <input id="tipo" type="text" class="form-control" placeholder="Ingrese el tipo de cáncer aquí">
            </div>
        </div>
    </div>
</div>
@endsection