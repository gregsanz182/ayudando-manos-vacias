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
            </ul>

            <div class="tab-content">
                <div id="perfil" class="tab-pane fade in active">
                    <form action="#">
                        <h3>Perfil</h3>
                        <div class="row">
                            <div class="col-xs-3">
                                <label for="nombre">Nombre</label>
                                <input name="nombre" type="text" class="form-control" value="José Sánchez">
                            </div>
                            <div class="col-xs-3">
                                <label for="usuario">Usuario</label>
                                <input name="usuario" type="text" class="form-control" value="js_123">
                            </div>
                            <div class="col-xs-6">
                                <label for="correo">Correo</label>
                                <input name="correo" type="text" class="form-control" value="js_123@gmail.com">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-xs-4">
                                <label for="contrasena1">Contraseña nueva</label>
                                <input name="contrasena1" type="text" class="form-control" placeholder="Ingrese contraseña">
                            </div>
                            <div class="col-xs-4">
                                <label for="contrasena2">Confirmar contraseña</label>
                                <input name="contrasena2" type="text" class="form-control" placeholder="Confirmar contraseña">
                            </div>
                            <div class="col-xs-4">
                                <buttom type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Actualizar</buttom>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <form action="#" class="row">
                        <h3>Agregar tipo de cáncer</h3>
                        <div class="col-xs-4">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre de cáncer">
                        </div>
                        <div class="col-xs-4">
                            <label for="nombre">Descripción</label>
                            <input name="descrip" type="text" class="form-control" placeholder="Ingrese una descripción">
                        </div>
                        <div class="col-xs-4">
                            <buttom type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</buttom>
                        </div>
                    </form>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <form action="#" class="row">
                        <h3>Agregar medicamento</h3>
                        <div class="col-xs-4">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre del medicamento">
                        </div>
                        <div class="col-xs-4">
                            <label for="descrip">Descripción</label>
                            <input name="descrip" type="text" class="form-control" placeholder="Ingrese una descripción">
                        </div>
                        <div class="col-xs-4">
                            <buttom type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</buttom>
                        </div>
                    </form>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <form action="#" class="row">
                        <h3>Agregar categoria de insumo</h3>
                        <div class="col-xs-3">
                            <label for="cat">Categoria</label>
                            <input name="categoria" type="text" class="form-control" placeholder="Ingrese categoria">
                        </div>
                        <div class="col-xs-3">
                            <buttom type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</buttom>
                        </div>
                    </form>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <form action="#" class="row">
                        <h3>Agregar localidad</h3>
                        <div class="col-xs-3">
                            <label for="nombre">Nombre</label>
                            <input name="nombre" type="text" class="form-control" placeholder="Ingrese nombre">
                        </div>
                        <div class="col-xs-3">
                            <label for="tipo">Tipo</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="ciudad" checked="checked"> Ciudad
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="estado"> Estado
                            </label>
                        </div>
                        <div class="col-xs-3">
                            <label for="estado">Estado</label>
                            <input name="estado" type="text" class="form-control" placeholder="Ingrese nombre">
                        </div>
                        <div class="col-xs-3">
                            <buttom type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</buttom>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection