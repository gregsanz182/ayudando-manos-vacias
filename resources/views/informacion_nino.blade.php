@extends('layouts.master') 
@section('contenido')
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Información</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <div class="col-xs-6">
            <h3><i class="fa fa-user-o"></i>&emsp;Información del niño</h3>
            <hr>
            <div class="list-group list-group-card">
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading" style="margin-bottom: 12px;">{{ $nino->nombre }} {{ $nino->apellido }}</h4>
                    <br>
                    @if($nino->identificacion != '')
                        <p class="list-group-item-text">
                            <strong><i class="fa fa-address-card-o"></i> Identificación:</strong> {{ $nino->identificacion }}
                        </p>
                    @endif
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-calendar-o"></i> Edad:</strong> {{Carbon\Carbon::createFromFormat('Y-m-d', $nino->fecha_nacimiento)->age}}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-transgender"></i> Genero:</strong>
                        @if($nino->genero=="M")
                            <i class='fa fa-mars'></i> Masculino
                        @else
                            <i class='fa fa-venus'></i> Femenino
                        @endif
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-heartbeat"></i> Situación Actual:</strong> {{ $nino->situacion_actual }}</p>
                    <p class="list-group-item-text">
                        <?php $conteo = count($nino->canceres) ?>
                        <strong><i class="fa fa-circle-o"></i> Cancer:</strong>
                        @foreach($nino->canceres as $cancer)
                            <span>{{$cancer->cancer->nombre}}</span>
                            @if($cancer->nombre_otro != '')
                                <span>({{$cancer->nombre_otro}})</span>
                            @endif
                            <span></span>
                            @if($cancer->estado_actual != '')
                                <span>("{{$cancer->estado_actual}}")</span>
                            @endif
                            @if($conteo-- > 1)
                                <span>-</span>
                            @endif
                        @endforeach
                    </p>
                    <p class="list-group-item-text">
                        <br>
                        <strong>Medicamentos e insumos que requiere:</strong>
                        <?php $conteo = count($nino->medicamentos) + count($nino->insumos); ?>
                        @foreach($nino->medicamentos as $medicamento)
                            <br>
                            &emsp;&emsp;&emsp;
                            <span><i class="fa fa-medkit"></i></span>
                            <span>{{$medicamento->medicamento->nombre}}</span>
                            @if($medicamento->nombre_otro != '')
                                <span>("{{$medicamento->nombre_otro}}")</span>
                            @endif
                            @if($medicamento->dosis != '')
                                <span>({{$medicamento->dosis}})</span>
                            @endif
                            <span>({{$medicamento->fecha}})</span>
                        @endforeach
                        @foreach($nino->insumos as $insumo)
                            <br>
                            &emsp;&emsp;&emsp;
                            <span><i class="fa fa-plus-square-o"></i></span>
                            <span>{{$insumo->nombre}}</span>
                            @if($medicamento->motivo != '')
                                <span>("{{$medicamento->motivo}}")</span>
                            @endif
                            <span>({{$medicamento->fecha}})</span>
                        @endforeach
                    </p>
                </a>
            </div>
        </div>
        <div class="col-xs-6">
            <h3><i class="fa fa-vcard-o"></i>&emsp;Información del representante</h3>
            <hr>
            <div class="list-group list-group-card">
                <a href="{{ route('info-rep', ['id' => $nino->representante->id]) }}" class="list-group-item">
                    <h4 class="list-group-item-heading" style="margin-bottom: 12px;"><span>{{ $nino->representante->nombre }} {{ $nino->representante->apellido }} ({{ $nino->relacion_repr }})</span></h4>
                    <br>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-calendar-o"></i> Edad:</strong> {{Carbon\Carbon::createFromFormat('Y-m-d', $nino->representante->fecha_nacimiento)->age}}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-address-card-o"></i> Cédula identidad:</strong> {{ $nino->representante->cedula }}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-dot-circle-o"></i> Ubicación:</strong> {{ $nino->representante->localidad->nombre }}, {{ $nino->representante->localidad->estado->nombre }}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-transgender"></i> Genero:</strong>
                        @if($nino->representante->genero=="M")
                            <i class='fa fa-mars'></i> Masculino
                        @else
                            <i class='fa fa-venus'></i> Femenino
                        @endif
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-home"></i> Dirección:</strong> {{$nino->representante->direccion}}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-phone"></i> Teléfono:</strong> {{$nino->representante->telefono}}
                    </p>
                </a>
            </div>
        </div>
    </div>
    <div class="row reg-desc">
        <h3>¿Tienes medicamentos o insumos que no usarás? !Donalos!... ¡Sé una mano amiga!</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh
            nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin
            laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
            Suspendisse potenti.</p>
    </div>
    <div class="row">
        <form action="{{ route('enviar_mensaje') }}" method='post'>
            <h3>...o enviale un mensaje a su representante</h3>
            <div class="row">
                <div class="col-xs-5 col-xs-offset-1">
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label for="nombre">Nombre completo</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                <input type="text" name="nombre" class="form-control" placeholder="Nombre y apellido" required>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xs-6">
                            <label for="correo">Correo electrónico</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input type="text" name="correo" class="form-control" placeholder="ejemplo@gmail.com" required>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label for="telefono">Teléfono (Opcional)</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" name="telefono" class="form-control" placeholder="(123) 1234567">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="row form-group">
                        <div class="col-xs-12">
                            <label for="mensaje">Mensaje</label>
                            <textarea type="text" name="mensaje" rows='5' class="form-control" placeholder="Mensaje (max. 500 caracteres)" required></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="row form-group">
                        <div class="col-xs-3 col-xs-offset-9">
                            <button class="btn btn-deafult btn-block btn-md button-reg" type='submit'>Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="nino_id" value="{{ $nino->id }}">
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
@endsection