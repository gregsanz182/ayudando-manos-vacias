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
            <h3><i class="fa fa-user-o"></i>&emsp;Información de infante</h3>
            <hr>
            <div class="list-group list-group-card">
                <div href="#" class="list-group-item">
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
                </div>
            </div>
        </div>
        <div class="col-xs-6">
            <h3><i class="fa fa-vcard-o"></i>&emsp;Información representante</h3>
            <hr>
            <div class="list-group list-group-card">
                <div href="#" class="list-group-item">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection