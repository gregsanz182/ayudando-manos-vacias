@extends('layouts.master')

@section('contenido')
    <div class="cabecera-titulo">
        <div class="container">
            <div class="row">
                <h2>Registro de representado</h2>
            </div>
        </div>
    </div>

    <div class="container" id="cuerpo">
        <div class="row">
            <div class="col-xs-4 reg-desc">
                <h3>Registra a tu hijo o representado.</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh
                    nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin
                    laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                    Suspendisse potenti.</p>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi
                    purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit
                    tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                    eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi
                    purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit
                    tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                    eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
            </div>
            <form class="col-xs-7 col-xs-offset-1 form-custom" method='post' action="{{ route('registrar_nino') }}">
                @include('includes.error_box')
                <h4>Información personal</h4>
                <div class="row form-group">
                    <div class="col-xs-4 {{ $errors->has('nombre')?'has-error':'' }}">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name='nombre' placeholder="Primer nombre" value="{{ $errors->has('nombre')?'':Request::old('nombre') }}">
                    </div>
                    <div class="col-xs-4 {{ $errors->has('apellido')?'has-error':'' }}">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name='apellido' placeholder="Primer apellido" value="{{ $errors->has('apellido')?'':Request::old('apellido') }}">
                    </div>
                    <div class="col-xs-4 {{ $errors->has('fecha_nacimiento')?'has-error':'' }}">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input placeholder='AAAA-MM-DD' type="date" name='fecha_nacimiento' class="form-control" value="{{ $errors->has('fecha_nacimiento')?'':Request::old('fecha_nacimiento') }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4 {{ $errors->has('genero')?'has-error':'' }}">
                        <label for="genero">Género</label>
                        <select class="form-control" name='genero'>
                            <option value="1" @if(Request::old('genero') == 1){{'selected'}}@endif>Masculino</option>
                            <option value="2" @if(Request::old('genero') == 2){{'selected'}}@endif>Femenino</option>
                        </select>
                    </div>
                    <div class="col-xs-4 {{ $errors->has('relacion_representante')?'has-error':'' }}">
                        <label for="relacion_representante">Relación con representante</label>
                        <select class="form-control" name='relacion_representante'>
                            <option selected>Relación</option>
                            @foreach($relacionesRepr as $key => $relacion)
                                <option value="{{ $key }}" @if(Request::old('relacion_representante') == $key){{'selected'}}@endif>{{ $relacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-4 {{ $errors->has('identificacion')?'has-error':'' }}">
                        <label for="identificacion">Identificación (Opcional)</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                            <input type="text" class="form-control" name='identificacion' value="{{ $errors->has('identificacion')?'':Request::old('identificacion') }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12 {{ $errors->has('situacion_actual')?'has-error':'' }}">
                        <label for="situacion_actual">Situación Actual</label>
                        <textarea class="form-control" rows="3" name='situacion_actual' placeholder="Breve descripción de la situación actual del niño (máx. 250 caracteres)" value="{{ $errors->has('situacion_actual')?'':Request::old('situacion_actual') }}"></textarea>
                    </div>
                </div>
                <hr>
                <h4>Tipo de cáncer que padece</h4>
                <div class="row form-group">
                    <div class="col-xs-5 {{ $errors->has('tipo_cancer')?'has-error':'' }}">
                        <label for="tipo_cancer">Tipo</label>
                        <select onchange="otroSelect(this, '#nombre_cancer_otro');" name="tipo_cancer" class="form-control selectpicker" data-live-search="true" title="Tipo de cáncer">
                            @foreach($canceres as $cancer)
                                <option value="{{ $cancer->id }}" @if(Request::old('tipo_cancer') == $key){{'selected'}}@endif>{{ $cancer->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-7">
                        <label for="nombre_cancer_otro">Nombre otro</label>
                        <input id='nombre_cancer_otro' type="text" class="form-control" name='otro_cancer' placeholder="Nombre" value='' disabled>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-7 {{ $errors->has('estado_actual_cancer')?'has-error':'' }}">
                        <label for="estado_actual_cancer">Estado Actual</label>
                        <input type="text" class="form-control" name='estado_actual_cancer' placeholder="Estado Actual" value="{{ $errors->has('estado_actual_cancer')?'':Request::old('estado_actual_cancer') }}">
                    </div>
                    <div class="col-xs-5 {{ $errors->has('fecha_desde')?'has-error':'' }}">
                        <label for="fecha_desde">Fecha de diagnóstico</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control" name='fecha_desde' value="{{ $errors->has('fecha_desde')?'':Request::old('fecha_desde') }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-10 col-xs-offset-1">
                        <p>Si el niño padece más de un tipo de cancer, puedes agregarlo más adelante.</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn btn-deafult btn-block btn-md button-reg" type='submit'>Registrar</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
@endsection