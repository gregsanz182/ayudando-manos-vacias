@extends('layouts.master') @section('contenido')
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Bandeja de mensajes</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-sm-12">
            @if( count($mensajes) == 0)
            <div class="row">
                <h4>Disculpa, todavia no posees mensajes en tu bandeja.</h4>
            </div>
            @else
                @foreach($mensajes as $mensaje)
                <div class="mensage-box">
                    <dl class="dl-horizontal">
                        <dt>Remitente: </dt>
                        <dd>{{ $mensaje->nombre_apellido_remitente }}</dd>
                        <dt>Correo: </dt>
                        <dd>{{ $mensaje->correo_remitente }}</dd>
                        <dt>Teléfono: </dt>
                        <dd>{{ $mensaje->telefono_remitente }}</dd>
                        <dt>Fecha: </dt>
                        <dd>{{ $mensaje->fecha }}</dd>
                        <dt>Destinatario (niño): </dt>
                        <dd>{{ $mensaje->nino->nombre }}</dd>
                        <dt>Mensaje: </dt>
                        <dd>{{ $mensaje->mensaje }}</dd>
                    </dl>
                </div>
                @endforeach
                {{ $mensajes->links() }}
            @endif
        </div>
    </div>
</div>
@endsection