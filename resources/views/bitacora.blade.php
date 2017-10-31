@extends('layouts.master') 

@section('contenido')
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Bitacora</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <div class="table-responsive">
                <table class="table table-striped">
                    <tr>
                        <th>Fecha</th>
                        <th>Id Usuario</th>
                        <th>Tabla</th>
                        <th>Acción</th>
                    </tr>
                    @foreach($bitacora as $bit)
                        <tr class="text-center">
                            <td>{{ $bit->fecha }}</td>
                            @if( $bit->usuario_id == null )
                                <td>---</td>
                            @else
                                <td>{{ $bit->usuario_id }}</td>
                            @endif
                            <td>{{ $bit->tabla }}</td>
                            <td>{{ $bit->accion }}</td>
                        </tr>
                    @endforeach
                </table>
              </div>
        </div>
    </div>
</div>
@endsection