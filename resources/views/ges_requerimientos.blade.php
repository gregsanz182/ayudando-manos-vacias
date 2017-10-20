@extends('layouts.master')

@section('contenido')
    <div class="cabecera-titulo">
        <div class="container">
            <div class="row">
                <h2>Gestión de requerimientos</h2>
            </div>
        </div>
    </div>
    <div class="container" id="cuerpo">
        <form class="col-xs-12" method='post' action="">
            <h3>Medicamentos</h3>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Otro nombre</th>
                        <th>Dosis</th>
                        <th>Estado</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meds as $med)
                        <tr>
                            <th>{{ $med->medicamento->nombre }}</th>
                            <th>{{ $med->nombre_otro }}</th>
                            <th>{{ $med->dosis }}</th>
                            <th>{{ $med->estado_requerimiento }}</th>
                            <th></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
@endsection