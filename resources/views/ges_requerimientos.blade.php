@extends('layouts.master') @section('contenido')
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
                {{ $nino_medicamentos->links() }}
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agg-medicamento-modal">
                    <i class="fa fa-plus"></i> Añadir medicamento</button>
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
                        @foreach($nino_medicamentos as $medicamento)
                        <tr>
                            <th>{{ $medicamento->medicamento->nombre }}</th>
                            <th>{{ $medicamento->nombre_otro }}</th>
                            <th>{{ $medicamento->fecha }}</th>
                            <th>{{ $medicamento->dosis }}</th>
                            <th>{{ $medicamento->estado_requerimiento }}</th>
                            <th>
                                <button type="button" class="btn btn-link" data-med-id=''>
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
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
                {{ $nino_insumos->links() }}
                <button type="button" class="btn btn-success">
                    <i class="fa fa-plus"></i> Añadir insumo</button>
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
                        @foreach($nino_insumos as $insumo)
                        <tr>
                            <th>{{ $insumo->nombre }}</th>
                            <th>{{ $insumo->categoria_insumo->nombre }}</th>
                            <th>{{ $insumo->fecha }}</th>
                            <th>{{ $insumo->motivo }}</th>
                            <th>{{ $insumo->estado_requerimiento }}</th>
                            <th>
                                <button type="button" class="btn btn-link" data-ins-id=''>
                                    <i class="fa fa-edit"></i>
                                </button>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="agg-medicamento-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar medicamento</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='medicamento'>Medicamento</label>
                            <select name="medicamento" id='otro_select' class="form-control selectpicker" data-live-search="true" title="Medicamento"
                                required>
                                @foreach($medicamentos as $medicamento)
                                <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='otro_medicamento'>Otro Nombre</label>
                            <input id='nombre_otro' type="text" class="form-control" name='otro_medicamento' placeholder="Nombre" value='' disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="fecha">Fecha limite</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar-plus-o"></i>
                                </span>
                                <input placeholder='AAAA-MM-DD' type="date" name='fecha' class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='dosis'>Dosis (Opcional)</label>
                            <input id='nombre_otro' type="text" class="form-control" name='dosis' placeholder="Dosis">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection