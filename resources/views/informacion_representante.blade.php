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
    <h3><i class="fa fa-vcard-o"></i>&emsp;Información del representante</h3>
    <div class="row">
        <div class="col-xs-12 col-md-10 col-md-offset-1">
            <hr>
            <div class="list-group list-group-card">
                <div class="list-group-item">
                    <h4 class="list-group-item-heading" style="margin-bottom: 12px;"><span>{{ $rep->nombre }} {{ $rep->apellido }}</span></h4>
                    <br>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-calendar-o"></i> Edad:</strong> {{Carbon\Carbon::createFromFormat('Y-m-d', $rep->fecha_nacimiento)->age}}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-address-card-o"></i> Cédula identidad:</strong> {{ $rep->cedula }}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-dot-circle-o"></i> Ubicación:</strong> {{ $rep->localidad->nombre }}, {{ $rep->localidad->estado->nombre }}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-transgender"></i> Genero:</strong>
                        @if($rep->genero=="M")
                            <i class='fa fa-mars'></i> Masculino
                        @else
                            <i class='fa fa-venus'></i> Femenino
                        @endif
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-home"></i> Dirección:</strong> {{$rep->direccion}}
                    </p>
                    <p class="list-group-item-text">
                        <strong><i class="fa fa-phone"></i> Teléfono:</strong> {{$rep->telefono}}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <h3><i class="fa fa-user-o"></i>&emsp;Información de los niños</h3>
    <hr>
    <div class="row">
        @foreach($rep->ninos as $nino)
            <div class="col-xs-6">
                <div class="list-group list-group-card">
                    <a href="{{ route('info_nino', ['id' => $nino->id]) }}" class="list-group-item">
                        <h4 class="list-group-item-heading" style="margin-bottom: 12px;">{{ $nino->nombre }} {{ $nino->apellido }}</h4>
                        <p class="list-group-item-text"><strong>Cancer:</strong> @include('includes.cancer_por_nino')</p>
                        <p class="list-group-item-text"><strong>Situación Actual:</strong> {{ $nino->situacion_actual }}</p>
                        <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> @include('includes.insumos_medicamentos_por_nino')</p>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row reg-desc">
        <h3>¿Tienes medicamentos o insumos que no usarás? !Donalos y ayúdame, dame una mano!</h3>
        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh
            nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin
            laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
            Suspendisse potenti.</p>
    </div>
</div>
@endsection