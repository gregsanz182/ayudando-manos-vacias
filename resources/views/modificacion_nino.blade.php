@extends('layouts.master') @section('contenido')
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Editar información de representado</h2>
        </div>
    </div>
</div>

<div class="container" id="cuerpo">
    <div class='row'>
        <h3><i class="fa fa-pencil"></i>&emsp;Modificar Niño</h3>
        <div class="col-xs-12 text-right">
            <a href="#" data-toggle="modal" data-target="#eliminar_nino">
                Eliminar niño
            </a>
            <button type="button" class="btn btn-success">
                        <i class="fa fa-medkit"></i> Modificar requerimientos</button>
        </div>
        <div class="col-xs-12">
            <h4>Tipos de cáncer que padece</h4>
            <hr>
            <div class="row">
                <div class="col-xs-12 text-right paginacion-meds-ins">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agg-insumo-modal">
                        <i class="fa fa-plus"></i> Añadir Cáncer</button>
                </div>
            </div>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Fecha diagnóstico</th>
                        <th>Nombre (Otro)</th>
                        <th>Estado Actual</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nino->canceres as $cancer)
                    <tr>
                        <th>{{ $cancer->cancer->nombre }}</th>
                        <th>{{ $cancer->fecha_desde }}</th>
                        <th>{{ $cancer->nombre_otro }}</th>
                        <th>{{ $cancer->estado_actual }}</th>
                        <th>
                            <button type="button" class="btn btn-link" onclick="modCancerModal('{{$cancer->id}}', '{{$cancer->cancer_id}}', '{{$cancer->nombre_otro}}', '{{$cancer->fecha_desde}}', '{{$cancer->estado_actual}}')">
                                <i class="fa fa-edit"></i>
                            </button>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
        <form class="col-xs-12" method='post' action="{{ route('modificar_nino', ['nino_id' => $nino->id]) }}">
            <h4>Información personal</h4>
            @include('includes.error_box')
            <div class="row form-group">
                <div class="col-xs-4 {{ $errors->has('nombre')?'has-error':'' }}">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name='nombre' placeholder="Primer nombre" value="{{$nino->nombre}}">
                </div>
                <div class="col-xs-4 {{ $errors->has('apellido')?'has-error':'' }}">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" name='apellido' placeholder="Primer apellido" value="{{ $nino->apellido }}">
                </div>
                <div class="col-xs-4 {{ $errors->has('fecha_nacimiento')?'has-error':'' }}">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input placeholder='AAAA-MM-DD' type="date" name='fecha_nacimiento' class="form-control" value="{{ $nino->fecha_nacimiento }}">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4 {{ $errors->has('genero')?'has-error':'' }}">
                    <label for="genero">Género</label>
                    <select class="form-control" name='genero'>
                        <option value="1" @if($nino->genero == 'M'){{'selected'}}@endif>Masculino</option>
                        <option value="2" @if($nino->genero == 'F'){{'selected'}}@endif>Femenino</option>
                    </select>
                </div>
                <div class="col-xs-4 {{ $errors->has('relacion_representante')?'has-error':'' }}">
                    <label for="relacion_representante">Relación con representante</label>
                    <select class="form-control" name='relacion_representante'>
                        <option selected>Relación</option>
                        @foreach($relacionesRepr as $key => $relacion)
                        <option value="{{ $key }}" @if($nino->relacion_repr == $relacion){{'selected'}}@endif>{{ $relacion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-4 {{ $errors->has('identificacion')?'has-error':'' }}">
                    <label for="identificacion">Identificación (Opcional)</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-address-card-o"></i>
                        </span>
                        <input type="text" class="form-control" name='identificacion' value="{{ $nino->identificacion }}">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-12 {{ $errors->has('situacion_actual')?'has-error':'' }}">
                    <label for="situacion_actual">Situación Actual</label>
                    <textarea class="form-control" rows="3" name='situacion_actual' placeholder="Breve descripción de la situación actual del niño (máx. 250 caracteres)">{{$nino->situacion_actual}}</textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4 col-xs-offset-4">
                    <button class="btn btn-deafult btn-block btn-md button-reg" type='submit'>Actualizar</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
<div class="modal fade" id="agg-insumo-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Agregar cáncer</h4>
            </div>
            <form action="{{ route('agregar_cancer', ['nino_id' => $nino->id]) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='cancer'>Cáncer</label>
                            <select name="cancer" onchange="otroSelect(this, '#nombre_otro');" class="form-control selectpicker" data-live-search="true"
                                title="Tipo de cáncer" required>
                                @foreach($canceres as $cancer)
                                <option value="{{ $cancer->id }}">{{ $cancer->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='otro_nombre'>Otro Nombre</label>
                            <input id='nombre_otro' type="text" class="form-control" name='otro_nombre' placeholder="Nombre" value='' disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="fecha">Fecha diagnóstico</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar-plus-o"></i>
                                </span>
                                <input placeholder='AAAA-MM-DD' type="date" name='fecha' class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='estado_actual'>Estado actual (Opcional)</label>
                            <input type="text" class="form-control" name='estado_actual' placeholder="Estado">
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
<div class="modal fade" id="mod-cancer-modal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Modificar cáncer</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for='cancer'>Cáncer</label>
                            <select name="cancer" onchange="otroSelect(this, '#nombre_otro2');" class="form-control selectpicker" data-live-search="true"
                                title="Tipo de cáncer" required>
                                @foreach($canceres as $cancer)
                                <option value="{{ $cancer->id }}">{{ $cancer->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='otro_nombre'>Otro Nombre</label>
                            <input id='nombre_otro2' type="text" class="form-control" name='otro_nombre' placeholder="Nombre" value='' disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6 form-group">
                            <label for="fecha">Fecha diagnóstico</label>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="fa fa-calendar-plus-o"></i>
                                </span>
                                <input placeholder='AAAA-MM-DD' type="date" name='fecha' class="form-control" required>
                            </div>
                        </div>
                        <div class="col-xs-6 form-group">
                            <label for='estado_actual'>Estado actual (Opcional)</label>
                            <input type="text" class="form-control" name='estado_actual' placeholder="Estado">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="" style="float: left; color: #4CAF50;">Eliminar cancer</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Modificar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="eliminar_nino" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Eliminar niño</h4>
            </div>
            <form action="{{ route('desactivar_nino', ['nino_id' => $nino->id]) }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            ¿Esta Seguro que desea dejar de representar a este niño?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-on">Aceptar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="nino_id" value="{{$nino->id}}">
            </form>
        </div>
    </div>
</div>
<script>
    var mod_cancer_url = "{{URL::to('modificar_cancer')}}" + "/{{ $nino->id }}/";
    var del_cancer_url = "{{URL::to('eliminar_cancer')}}" + "/{{ $nino->id }}/";
</script>
@endsection