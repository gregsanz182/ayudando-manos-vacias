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
                    <h3>HOME</h3>
                    <p>Some content.</p>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <form action="#" class="row">
                        <h3>Agregar tipo de cáncer</h3>
                        <div class="col-xs-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" placeholder="Ingrese nombre de cáncer">
                        </div>
                        <div class="col-xs-4">
                            <label for="nombre">Descripción</label>
                            <input type="text" class="form-control" placeholder="Ingrese una descripción">
                        </div>
                        <div class="col-xs-4">
                            <buttom type="submit" class="btn btn-deafult btn-block btn-md button-reg abajo">Agregar</buttom>
                        </div>
                    </form>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Agregar medicamento</h3>
                    <p>Some content in menu 2.</p>
                </div>
                <div id="menu3" class="tab-pane fade">
                    <h3>Agregar categoria de insumo</h3>
                    <p>Some content in menu 1.</p>
                </div>
                <div id="menu4" class="tab-pane fade">
                    <div class="row">
                        <h3>Agregar localidad</h3>
                        <div class="col-xs-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" placeholder="Ingrese nombre">
                        </div>
                        <div class="col-xs-4">
                            <label for="tipo">Tipo</label><br>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked="checked"> Ciudad
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Estado
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection