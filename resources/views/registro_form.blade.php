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
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh
                    nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin
                    laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                    Suspendisse potenti.</p>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi
                    purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit
                    tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                    eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
            </div>
            <form class="col-xs-7 col-xs-offset-1 form-custom" method='post'>
                <h4>Información de usuario</h4>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label for="usuario">Usuario</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input type="text" name="usuario" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label for="correo">Correo electronico</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                            <input type="text" name="correo" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <label for="contrasena">Contraseña</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="contrasena" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-6">
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
                    <div class="col-xs-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Primer nombre">
                    </div>
                    <div class="col-xs-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" class="form-control" placeholder="Primer apellido">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <label for="cedula">Cédula de identidad</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-id-card-o"></i></span>
                            <input type="text" name="cedula" class="form-control" placeholder="Documento de identidad">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" name="fecha_nacimiento" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <label for="telefono">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                            <input type="text" name="telefono" class="form-control" placeholder="Teléfono">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label for="direccion">Dirección</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-building"></i></span>
                            <input type="text" name="direccion" class="form-control" placeholder="Dirección actual">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" id="estado_select">
                            <option selected>Selecciona un Estado</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <label for="municipio">Municipio</label>
                        <select name="municipio" class="form-control" id="ciudad_select">
                            <option selected>Selecciona un municipio</option>
                            <option value="1">Andrés Bello</option>
                            <option value="2">Ayacucho</option>
                            <option value="3">Cárdenas</option>
                            <option value="4">Guásimos</option>
                            <option value="5">Indepencia</option>
                            <option value="6">Libertad</option>
                            <option value="7">San Cristóbal</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn btn-default button-reg btn-block btn-md" action="">Registrarse</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        var cityUrl = "{{ route('obtener_ciudades') }}";
    </script>
@endsection