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
                                @if($medicamento->estado_requerimiento == 'Requerido')
                                <button type="button" class="btn btn-link" onclick="modMedicamentoModal('{{$medicamento->id}}', '{{$medicamento->medicamento_id}}', '{{$medicamento->fecha}}', '{{$medicamento->dosis}}', '{{$medicamento->nombre_otro}}')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @endif
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agg-insumo-modal">
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
                                @if($insumo->estado_requerimiento == 'Requerido')
                                <button type="button" class="btn btn-link" onclick="modInsumoModal('{{$insumo->id}}', '{{$insumo->categoria_insumo_id}}', '{{$insumo->nombre}}', '{{$insumo->fecha}}', '{{$insumo->motivo}}')">
                                    <i class="fa fa-edit"></i>
                                </button>
                                @endif
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
            <form action="{{ route('agregar_medicamento', ['nino_id' => $nino_id]) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='medicamento'>Medicamento</label>
                            <select name="medicamento" onchange="otroSelect(this, '#nombre_otro');" class="form-control selectpicker" data-live-search="true" title="Medicamento"
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
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mod-medicamento-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modificar medicamento</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='medicamento'>Medicamento</label>
                            <select name="medicamento" onchange="otroSelect(this, '#nombre_otro2');" class="form-control selectpicker" data-live-search="true" title="Medicamento"
                                required>
                                @foreach($medicamentos as $medicamento)
                                <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='otro_medicamento'>Otro Nombre</label>
                            <input id='nombre_otro2' type="text" class="form-control" name='otro_medicamento' placeholder="Nombre" value='' disabled>
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
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name='donado'> Donado
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" style="float: left; color: #CE4844;">Eliminar requerimiento</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Modificar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="agg-insumo-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar insumo</h4>
            </div>
            <form action="{{ route('agregar_insumo', ['nino_id' => $nino_id]) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='categoria_insumo'>Categoria</label>
                            <select name="categoria_insumo" class="form-control selectpicker" data-live-search="true" title="Categoria"
                                required>
                                @foreach($insumos_cat as $insumo_cat)
                                    <option value="{{ $insumo_cat->id }}">{{ $insumo_cat->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='insumo'>Insumo</label>
                            <input type="text" class="form-control" name='insumo' placeholder="Nombre insumo" required>
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
                            <label for='motivo'>Motivo (Opcional)</label>
                            <input id='motivo' type="text" class="form-control" name='dosis' placeholder="Motivo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="mod-insumo-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modificar insumo</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='categoria_insumo'>Categoria</label>
                            <select name="categoria_insumo" class="form-control selectpicker" data-live-search="true" title="Categoria"
                                required>
                                @foreach($insumos_cat as $insumo_cat)
                                    <option value="{{ $insumo_cat->id }}">{{ $insumo_cat->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='insumo'>Insumo</label>
                            <input type="text" class="form-control" name='insumo' placeholder="Nombre insumo" required>
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
                            <label for='motivo'>Motivo (Opcional)</label>
                            <input id='motivo' type="text" class="form-control" name='dosis' placeholder="Motivo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name='donado'> Donado
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" style="float: left; color: #CE4844;">Eliminar requerimiento</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Modificar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<script>
    var mod_medicamento_url = "{{URL::to('modificar_medicamento')}}"+"/{{ $nino_id }}/";
    var del_medicamento_url = "{{URL::to('eliminar_medicamento')}}"+"/{{ $nino_id }}/";
    var mod_insumo_url = "{{URL::to('modificar_insumo')}}"+"/{{ $nino_id }}/";
    var del_insumo_url = "{{URL::to('eliminar_insumo')}}"+"/{{ $nino_id }}/";
</script>
@endsection