@extends('layouts.master')

@section('contenido')<div class="cabecera-titulo">
    <div class="container">
        <div class="row">
            <h2>Bienvenido Administrador</h2>
        </div>
    </div>
</div>
<div class="container" id="cuerpo">
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#perfil">Perfil</a></li>
                <li><a data-toggle="tab" href="#menu1">Tipo de Cáncer</a></li>
                <li><a data-toggle="tab" href="#menu2">Medicamento</a></li>
                <li><a data-toggle="tab" href="#menu3">Categoria de Insumo</a></li>
                <li><a data-toggle="tab" href="#menu4">Localidad</a></li>
                <li><a data-toggle="tab" href="#menu5">Administrador</a></li>
            </ul>

            <div class="tab-content">
                <!-- **********************  PERFIL  ********************** -->
                <div id="perfil" class="tab-pane fade in active">
                    <form action="{{ route('actualizar-perfil') }}" method="post" class="row">
                        <h3>Perfil</h3>
                        @include('includes.error_box')
                        <div class="row">
                            <div class="col-xs-3 {{ $errors->has('nombre_p')?'has-error':'' }} ">
                                <label for="nombre_p">Nombre completo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input name="nombre_p" type="text" class="form-control" value="{{ $nombre }}">
                                </div>
                            </div>
                            <div class="col-xs-3  {{ $errors->has('usuario_p')?'has-error':'' }}">
                                <label for="usuario_p">Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input name="usuario_p" type="text" disabled class="form-control" value="{{ Auth::user()->usuario }}">
                                </div>
                            </div>
                            <div class="col-xs-6 {{ $errors->has('correo')?'has-error':'' }}">
                                <label for="correo_p">Correo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                                    <input name="correo_p" type="email" class="form-control" value="{{ Auth::user()->correo }}">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-xs-4 {{ $errors->has('contrasena1_p')?'has-error':'' }}">
                                <label for="contrasena1_p">Contraseña nueva</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input name="contrasena1_p" type="password" class="form-control" placeholder="Ingrese contraseña">
                                </div>
                            </div>
                            <div class="col-xs-4 {{ $errors->has('contrasena2_p')?'has-error':'' }}">
                                <label for="contrasena2_p">Confirmar contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                                    <input name="contrasena2_p" type="password" class="form-control" placeholder="Confirmar contraseña">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Actualizar</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
                <!-- **********************  CANCER  ********************** -->
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event1" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <!-- **********************  AGREGAR CANCER  ********************** -->
                    <div class="row">
                        <h3>Agregar tipo de cáncer</h3>
                        <form action="{{ route('guardar-tipo-cancer') }}" method="post">
                            @include('includes.error_box')
                            <div class="col-xs-4 {{ $errors->has('tipo_c')?'has-error':'' }}">
                                <label for="tipo_c">Tipo</label>
                                <input name="tipo_c" type="text" class="form-control" required placeholder="Ingrese tipo de cáncer">
                            </div>
                            <div class="col-xs-4 {{ $errors->has('desc_c')?'has-error':'' }}">
                                <label for="desc_c">Descripción</label>
                                <input name="desc_c" type="text" class="form-control" required placeholder="Ingrese una descripción">
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                    <!-- **********************  ACTUALIZAR CANCER  ********************** -->
                    <hr>
                    <div class="row">
                        <h3>Actualizar tipo de cáncer</h3>
                        <h3>Buscar</h3>
                        <div class="col-xs-4">
                            <label for="tipo_c">Tipo</label>
                            <select name="tipo_c" class="form-control" required id="tipo_c">
                                <option selected>Selecciona un Tipo</option>
                                @foreach($tiposcancer as $cancer)
                                    <option value="{{ $cancer->id }}">{{ $cancer->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" id="buscar_cancer" class="btn btn-deafult btn-block btn-md button-reg abajo">Buscar</button>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Modificar</h3>
                        <form action="{{ route('actualizar-tipo-cancer') }}" method="post">
                            <div class="col-xs-4">
                                <label for="tipo_c_a">Tipo</label>
                                <input name="tipo_c_a" type="text" class="form-control" required>
                            </div>
                            <div class="col-xs-4">
                                <label for="desc_c_a">Descripción</label>
                                <input name="desc_c_a" type="text" class="form-control" required>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Actualizar</button>
                            </div>
                            <input type="hidden" id="id">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
                <!-- **********************  MEDICAMENTO  ********************** -->
                <div id="menu2" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event2" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <h3>Agregar medicamento</h3>
                        <form action="{{ route('guardar-medicamento') }}" method="post">
                            @include('includes.error_box')
                            <div class="col-xs-4 {{ $errors->has('nombre_m')?'has-error':'' }}">
                                <label for="nombre_m">Nombre</label>
                                <input name="nombre_m" type="text" class="form-control" required placeholder="Ingrese nombre del medicamento">
                            </div>
                            <div class="col-xs-4 {{ $errors->has('desc_m')?'has-error':'' }}">
                                <label for="desc_m">Descripción</label>
                                <input name="desc_m" type="text" class="form-control" required placeholder="Ingrese una descripción">
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                    <!-- **********************  ACTUALIZAR MEDICAMENTO  ********************** -->
                    <hr>
                    <div class="row">
                        <h3>Actualizar medicamento</h3>
                        <h3>Buscar</h3>
                        <div class="col-xs-4">
                            <label for="nombre_m">Nombre</label>
                            <select name="nombre_m" class="form-control" required id="nombre_m">
                                <option selected>Selecciona medicamento</option>
                                @foreach($medicamentos as $medicamento)
                                    <option value="{{ $medicamento->id }}">{{ $medicamento->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" id="buscar_medicamento" class="btn btn-deafult btn-block btn-md button-reg abajo">Buscar</button>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Modificar</h3>
                        <form action="{{ route('actualizar-medicamento') }}" method="post">
                            <div class="col-xs-4">
                                <label for="nombre_m_a">Tipo</label>
                                <input name="nombre_m_a" type="text" class="form-control" required>
                            </div>
                            <div class="col-xs-4">
                                <label for="desc_m_a">Descripción</label>
                                <input name="desc_m_a" type="text" class="form-control" required>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Actualizar</button>
                            </div>
                            <input type="hidden" id="id">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
                <!-- **********************  CATEGORIA INSUMO  ********************** -->
                <div id="menu3" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event3" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <h3>Agregar categoria de insumo</h3>
                        <form action="{{ route('guardar-categoria-insumo') }}" method="post">
                            @include('includes.error_box')
                            <div class="col-xs-3 {{ $errors->has('categoria')?'has-error':'' }}">
                                <label for="categoria">Categoria</label>
                                <input name="categoria" type="text" class="form-control" required placeholder="Ingrese categoria">
                            </div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</button>
                            </div>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                    <!-- **********************  ACTUALIZAR INSUMO  ********************** -->
                    <hr>
                    <div class="row">
                        <h3>Actualizar categoria insumo</h3>
                        <h3>Buscar</h3>
                        <div class="col-xs-4">
                            <label for="nombre_i">Nombre</label>
                            <select name="nombre_i" class="form-control" required id="nombre_i">
                                <option selected>Selecciona insumo</option>
                                @foreach($insumos as $insumo)
                                    <option value="{{ $insumo->id }}">{{ $insumo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" id="buscar_insumo" class="btn btn-deafult btn-block btn-md button-reg abajo">Buscar</button>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Modificar</h3>
                        <form action="{{ route('actualizar-insumo') }}" method="post">
                            <div class="col-xs-4">
                                <label for="nombre_i_a">Categoria</label>
                                <input name="nombre_i_a" type="text" class="form-control" required>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Actualizar</button>
                            </div>
                            <input type="hidden" id="id">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
                <!-- **********************  LOCALIDAD  ********************** -->
                <div id="menu4" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event4" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <h3>Agregar localidad</h3>
                        <form action="{{ route('guardar-localidad') }}" method="post">
                            @include('includes.error_box')
                            <div class="col-xs-3 {{ $errors->has('nombre_l')?'has-error':'' }}">
                                <label for="nombre_l">Nombre</label>
                                <input name="nombre_l" type="text" class="form-control" required placeholder="Ingrese nombre">
                            </div>
                            <div class="col-xs-3">
                                <label for="tipo">Tipo</label><br>
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" checked="checked"> Ciudad
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2"> Estado
                                </label>
                            </div>
                            <div class="col-xs-3 {{ $errors->has('estado')?'has-error':'' }}">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control" id="estado">
                                    <option value="0" selected>Selecciona un Estado</option>
                                    @foreach($estados as $estado)
                                        <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</button>
                            </div>
                            <input type="hidden" id="localidad_id" name="localidad_id">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                    <!-- **********************  ACTUALIZAR LOCALIDAD  ********************** -->
                    <hr>
                    <div class="row">
                        <h3>Actualizar localidad</h3>
                        <h3>Buscar</h3>
                        <div class="col-xs-4">
                            <label for="nombre_i">Nombre</label>
                            <select name="nombre_i" class="form-control" required id="nombre_i">
                                <option selected>Selecciona Localidad</option>
                                @foreach($localidades as $localidad)
                                    <option value="{{ $localidad->id }}">{{ $localidad->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" id="buscar_localidad" class="btn btn-deafult btn-block btn-md button-reg abajo">Buscar</button>
                        </div>
                    </div>
                    <div class="row">
                        <h3>Modificar</h3>
                        <form action="{{ route('actualizar-localidad') }}" method="post">
                            <div class="col-xs-4">
                                <label for="nombre_l_a">Categoria</label>
                                <input name="nombre_l_a" type="text" class="form-control" required>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Actualizar</button>
                            </div>
                            <input type="hidden" id="id">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
                <!-- **********************  ADMINISTRADOR  ********************** -->
                <div id="menu5" class="tab-pane fade">
                    <form action="{{ route('guardar-admin') }}" method="post" class="row">
                        <h3>Agregar Administrador</h3>
                        @include('includes.error_box')
                        <div class="row">
                            <div class="col-xs-3 {{ $errors->has('nombre_n')?'has-error':'' }}">
                                <label for="nombre_n">Nombre completo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input name="nombre_n" type="text" class="form-control" placeholder="Ingrese nombre y apellido">
                                </div>
                            </div>
                            <div class="col-xs-3 {{ $errors->has('usuario_n')?'has-error':'' }}">
                                <label for="usuario_n">Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                                    <input name="usuario_n" type="text" class="form-control" placeholder="Ingrese Usuario">
                                </div>
                            </div>
                            <div class="col-xs-6 {{ $errors->has('correo_n')?'has-error':'' }}">
                                <label for="correo_n">Correo</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope-open-o"></i></span>
                                    <input name="correo_n" type="email" class="form-control" placeholder="Ingrese correo">
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-xs-4 {{ $errors->has('contrasena1_n')?'has-error':'' }}">
                                <label for="contrasena1_n">Contraseña nueva</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input name="contrasena1_n" type="password" class="form-control" placeholder="Ingrese contraseña">
                                </div>
                            </div>
                            <div class="col-xs-4 {{ $errors->has('contrasena2_n')?'has-error':'' }}">
                                <label for="contrasena2_n">Confirmar contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-repeat"></i></span>
                                    <input name="contrasena2_n" type="password" class="form-control" placeholder="Confirmar contraseña">
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <button type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Guardar</button>
                            </div>
                        </div>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var tipoCancer = "{{ route('buscar-tipo-cancer') }}";
    var medicamento = "{{ route('buscar-medicamento') }}";
    var insumo = "{{ route('buscar-insumo') }}";
    var localidad = "{{ route('buscar-localidad') }}";
</script>
@endsection