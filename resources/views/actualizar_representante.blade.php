@extends('layouts.master')

@section('contenido')
<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Bienvenid@ {{ $repre->rol->nombre }}</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <h3><i class="fa fa-pencil"></i>&emsp;Modificar perfil</h3>
        <div class="col-xs-12 text-right">
            <a href="#" data-toggle="modal" data-target="#eliminar_cuenta">
                Desactivar cuenta
            </a>
        </div>
        <form action="{{ route('actualizar-perfil') }}" method="post">
            @include('includes.error_box')
            <h4>Información de usuario</h4>
            <div class="row form-group">
                <div class="col-xs-3 form-group">
                    <label for="usuario">Usuario</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                        <input type="text" name="usuario" class="form-control" value="{{ $repre->usuario }}">
                    </div>
                </div>
                <div class="col-xs-3">
                    <label for="correo">Correo electronico</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                        <input type="email" name="correo" class="form-control" required value="{{  $repre->correo }}">
                    </div>
                </div>
                <div class="col-xs-3">
                    <label for="contrasena">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input type="password" name="contrasena" placeholder="Ingrese contraseña" class="form-control">
                    </div>
                </div>
                <div class="col-xs-3">
                    <label for="confirmar_contrasena">Confirmar Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                        <input type="password" name="confirmar_contrasena" placeholder="Confirme contraseña" class="form-control">
                    </div>
                </div>
            </div>

            <h4>Información Personal</h4>
            <div class="row form-group">
                <div class="col-xs-3">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" required placeholder="Primer nombre" value="{{ $repre->rol->nombre }}">
                </div>
                <div class="col-xs-3">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" class="form-control" required placeholder="Primer apellido" value="{{ $repre->rol->apellido }}">
                </div>
                <div class="col-xs-3">
                    <label for="cedula">Cédula de identidad</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                        <input type="text" name="cedula" class="form-control" required placeholder="Documento de identidad" value="{{ $repre->rol->cedula }}">
                    </div>
                </div>
                <div class="col-xs-3">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                        <input type="date" placeholder="AAAA-MM-DD" required name="fecha_nacimiento" class="form-control" value="{{ $repre->rol->fecha_nacimiento }}">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-3">
                    <label for="genero">Genero</label>
                    <select name="genero" class="form-control">
                        <option value="1" @if( $repre->rol->genero == 1 ){{'selected'}}@endif>Masculino</option>
                        <option value="2" @if( $repre->rol->genero == 2 ){{'selected'}}@endif>Femenino</option>
                    </select>
                </div>
                <div class="col-xs-3">
                    <label for="telefono">Teléfono</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                        <input type="text" name="telefono" class="form-control" required placeholder="Teléfono" value="{{ $repre->rol->telefono }}">
                    </div>
                </div>
                <div class="col-xs-6">
                    <label for="direccion">Dirección</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                        <input type="text" name="direccion" class="form-control" required placeholder="Dirección actual" value="{{$repre->rol->direccion  }}">
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4">
                    <label for="estado">Estado</label>
                    <select name="estado" class="form-control" id="estado_select">
                        @foreach($estados as $estado)
                            @if( $estado->id == $repre->rol->localidad->estado->id)
                                <option selected value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @else
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-4">
                    <label for="municipio">Municipio</label>
                    <select name="municipio" class="form-control" id="ciudad_select">
                        <option selected value="{{ $repre->rol->localidad_id }}">{{ $repre->rol->localidad->nombre }}</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-4 col-md-offset-4 col-xs-8 col-xs-offset-2">
                    <button class="btn btn-default button-reg btn-block btn-md" type="submit">Actualizar</button>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </form>
    </div>
</div>
<div class="modal fade" id="eliminar_cuenta" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="gridSystemModalLabel">Desactivar cuenta</h4>
            </div>
            <form action="{{ route('desactivar_cuenta') }}" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1">
                            ¿Esta Seguro que desea desactivar su cuenta?
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-on">Aceptar</button>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
</div>
<script>
    var cityUrl = "{{ route('obtener_ciudades') }}";
</script>
@endsection