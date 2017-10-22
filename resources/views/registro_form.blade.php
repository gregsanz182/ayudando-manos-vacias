@extends('layouts.master')

@section('contenido')
    <div class="cabecera-titulo">
        <div class="container">
            <div class="row">
                <h2>Registro de representante</h2>
            </div>
        </div>
    </div>

    <div class="container" id="cuerpo">
        <div class="row">
            <div class="col-xs-4 reg-desc">
                <h3>Registrandote, tu hijo o representado puede recibir ayuda.</h3>
                <p>Si no posee los recursos necesarios, o no no encuentras por tus propios medios los insumos o medicamentos 
                que requiere tu hijo o familiar cercano a tu cargo, puedes registrarte, esta página esta hecha con la finalidad 
                de ser un puente de comunicación entre familias afectadas por esta enfermedad y personas dispuestas a ayudar 
                a niño con cancer.</p>
                <p>El servicio que se presta es exclusivo para medicamentos e insumos, <strong>NO</strong> para efectos 
                lucrativos.</p>
                <p>El registro es totalmente <strong>gratis</strong>.</p>
                <p>Poseeras un buzón de mensajes para las personas que se quieran comunicar contigo.</p>
                <p>Tienes la posibilidad de agregar medicamnetos o insumos por niño, que necesites, y marcarlos como donados.</p>
                <p>Si tu niño ya no necesita de los servicios que esta página ofrece, puedes eliminarlo.</p>
                <p>Si tú, como representante no necesitas de los servicios de esta página puedes eliminar tu cuenta.</p>
            </div>
            <form class="col-xs-7 col-xs-offset-1 form-custom" method='post' action="{{ route('registrar') }}">
                @include('includes.error_box')
                <h4>Información de usuario</h4>
                <div class="row form-group">
                    <div class="col-xs-6 form-group {{ $errors->has('usuario')?'has-error':'' }}">
                        <label for="usuario">Usuario</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" name="usuario" class="form-control" placeholder="Ingresa un usuario" value="{{ $errors->has('usuario')?'':Request::old('usuario') }}">
                        </div>
                    </div>
                    <div class="col-xs-6 {{ $errors->has('correo')?'has-error':'' }}">
                        <label for="correo">Correo electronico</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                            <input type="email" name="correo" class="form-control" placeholder="Ingresa tu correo" value="{{ $errors->has('correo')?'':Request::old('correo') }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6 {{ $errors->has('contrasena')?'has-error':'' }}">
                        <label for="contrasena">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="contrasena" placeholder="Mínimo 4 caracteres" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-6 {{ $errors->has('confirmar_contrasena')?'has-error':'' }}">
                        <label for="confirmar_contrasena">Confirmar Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                            <input type="password" name="confirmar_contrasena" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Información Personal</h4>
                <div class="row form-group">
                    <div class="col-xs-6 {{ $errors->has('nombre')?'has-error':'' }}">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Primer nombre" value="{{ $errors->has('nombre')?'':Request::old('nombre') }}">
                    </div>
                    <div class="col-xs-6 {{ $errors->has('apellido')?'has-error':'' }}">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Primer apellido" value="{{ $errors->has('apellido')?'':Request::old('apellido') }}">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-5 {{ $errors->has('cedula')?'has-error':'' }}">
                        <label for="cedula">Cédula de identidad</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                            <input type="text" name="cedula" class="form-control" placeholder="Documento de identidad" value="{{ $errors->has('cedula')?'':Request::old('cedula') }}">
                        </div>
                    </div>
                    <div class="col-xs-4 {{ $errors->has('fecha_nacimiento')?'has-error':'' }}">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" placeholder="AAAA-MM-DD" name="fecha_nacimiento" class="form-control" value="{{ $errors->has('fecha_nacimiento')?'':Request::old('fecha_nacimiento') }}">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <label for="genero">Genero</label>
                        <select name="genero" class="form-control">
                            <option value="1" @if(Request::old('genero') == 1){{'selected'}}@endif>Masculino</option>
                            <option value="2" @if(Request::old('genero') == 2){{'selected'}}@endif>Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6 {{ $errors->has('telefono')?'has-error':'' }}">
                        <label for="telefono">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value="{{ $errors->has('telefono')?'':Request::old('telefono') }}">
                        </div>
                    </div>
                    <div class="col-xs-6 {{ $errors->has('direccion')?'has-error':'' }}">
                        <label for="direccion">Dirección</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección actual" value="{{ $errors->has('direccion')?'':Request::old('direccion') }}">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6 {{ $errors->has('estado')?'has-error':'' }}">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" id="estado_select">
                            <option selected>Selecciona un Estado</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6 {{ $errors->has('municipio')?'has-error':'' }}">
                        <label for="municipio">Municipio</label>
                        <select name="municipio" class="form-control" id="ciudad_select">
                            <option selected>Selecciona un municipio</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn btn-default button-reg btn-block btn-md" type="submit">Registrarse</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </form>
        </div>
    </div>
    <script>
        var cityUrl = "{{ route('obtener_ciudades') }}";
    </script>
@endsection