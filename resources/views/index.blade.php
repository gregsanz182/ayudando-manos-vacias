@extends('layouts.master')

@section('contenido')    
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>...Porque los niños no pueden luchar solos contra el cáncer... ¡Apóyalos!</h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <img src="img/sidebar.jpg" class="img-responsive" alt="niños contra el cancer">
    </div>
</div>
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>...Se una mano amiga en los momentos más díficles de nuestros niños</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <div class="col-md-6 col-sm-8 col-xs-12">
            <h4><a href="{{ route('registro') }}">Registrate</a> si necesitas de la ayuda que otras personas puedan darte.</h4>
            <img src="img/sonreir.fw.png" class="img-responsive" alt="Día internacional del cáncer infantil">
        </div>
        <div class="col-md-6 col-sm-8 col-xs-12">
            <h4>Ingresa los medicamentos e insumos que necesites para tu niño.</h4>
            <img src="img/familia.fw.png" class="img-responsive" alt="Día internacional del cáncer infantil">
        </div>
    </div>
</div>
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Si no sabes como empieza el cáncer en niños, lee el segmento a continuación</h2>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <img src="img/sintomas.jpg" class="img-responsive" alt="niños contra el cancer">
    </div>
</div>
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h3>...Ayúdanos a difundir esta información, <a href="#">copia y pega este link</a> en tus redes sociales.</h3>
        </div>
    </div>
</div>
@endsection