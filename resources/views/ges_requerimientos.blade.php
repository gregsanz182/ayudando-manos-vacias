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
        <div class="row tabla-reqs">
            <h3>Medicamentos</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-right paginacion-meds-ins">
                    {{ $medicamentos->links() }}
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Añadir medicamento</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Otro nombre</th>
                                <th>Fecha limite</th>
                                <th>Dosis</th>
                                <th>Estado</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($medicamentos as $medicamento)
                                <tr>
                                    <th>{{ $medicamento->medicamento->nombre }}</th>
                                    <th>{{ $medicamento->nombre_otro }}</th>
                                    <th>{{ $medicamento->fecha }}</th>
                                    <th>{{ $medicamento->dosis }}</th>
                                    <th>{{ $medicamento->estado_requerimiento }}</th>
                                    <th><button type="button" class="btn btn-link" data-med-id=''><i class="fa fa-edit"></i></button></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row tabla-reqs">
            <h3>Insumos</h3>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-right paginacion-meds-ins">
                    {{ $insumos->links() }}
                    <button type="button" class="btn btn-success"><i class="fa fa-plus"></i> Añadir insumo</button>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Fecha limite</th>
                                <th>Motivo</th>
                                <th>Estado</th>
                                <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($insumos as $insumo)
                                <tr>
                                    <th>{{ $insumo->nombre }}</th>
                                    <th>{{ $insumo->categoria_insumo->nombre }}</th>
                                    <th>{{ $insumo->fecha }}</th>
                                    <th>{{ $insumo->motivo }}</th>
                                    <th>{{ $insumo->estado_requerimiento }}</th>
                                    <th><button type="button" class="btn btn-link" data-ins-id=''><i class="fa fa-edit"></i></button></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection