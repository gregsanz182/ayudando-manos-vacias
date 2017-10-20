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
                <div id="menu1" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <div id="opc1" class="activo">
                            <form action="{{ route('guardar-tipo-cancer') }}" method="post">
                                <h3>Agregar tipo de cáncer</h3>
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
                        <div id="opc2" class="oculto">HOLA</div>
                    </div>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <div id="opc1" class="activo">
                            <form action="{{ route('guardar-medicamento') }}" method="post">
                                <h3>Agregar medicamento</h3>
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
                        <div id="opc2" class="oculto">HOLA</div>
                    </div>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <div id="opc1" class="activo">
                            <form action="{{ route('guardar-categoria-insumo') }}" method="post">
                                <h3>Agregar categoria de insumo</h3>
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
                        <div id="opc2" class="oculto">HOLA</div>
                    </div>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="row">
                        <input id="toggle-event" type="checkbox" data-on="Guardar" data-off="Actualizar" checked data-toggle="toggle" data-width="110" data-onstyle="on" data-offstyle="off">
                    </div>
                    <div class="row">
                        <div id="opc1" class="activo">
                            <form action="{{ route('guardar-localidad') }}" method="post">
                                <h3>Agregar localidad</h3>
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
                        <div id="opc2" class="oculto">
                            HOLA
                        </div>
                    </div>
                </div>
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
@endsection