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
                <h4>Información personal</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name='nombre' placeholder="Primer nombre">
                    </div>
                    <div class="col-xs-4">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" name='apellido' placeholder="Primer apellido">
                    </div>
                    <div class="col-xs-4">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" name='fecha_nacimiento' class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="genero">Género</label>
                        <select class="form-control" name='genero'>
                            <option value="1">Masculino</option>
                            <option value="2">Femenino</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="relacion">Relación con representante</label>
                        <select class="form-control" name='relacion_representate'>
                            @foreach($relacionesRepr as $key => $relacion)
                                <option value="{{ $key }}">{{ $relacion }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="identificacion">Identificación (Opcional)</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-address-card-o"></i></span>
                            <input type="text" class="form-control" name='identificacion'>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label for="nombre">Situación Actual</label>
                        <textarea class="form-control" rows="3" placeholder="Breve descripción de la situación actual del niño (máx. 250 caracteres)"></textarea>
                    </div>
                </div>
                <hr>
                <h4>Tipo de cáncer que padece</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="tipo_cancer">Tipo</label>
                        <select name="tipo_cancer" class="form-control selectpicker" data-live-search="true" title="Tipo de cáncer">
                            @foreach($canceres as $cancer)
                                <option value="{{ $cancer->id }}">{{ $cancer->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="estado_actual_cancer">Estado Actual</label>
                        <input type="text" class="form-control" placeholder="Estado Actual">
                    </div>
                    <div class="col-xs-4">
                        <label for="fecha_desde">Fecha de diagnóstico</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control" name='fecha_desde'>
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
            </form>
        </div>
    </div>
@endsection