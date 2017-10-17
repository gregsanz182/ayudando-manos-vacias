@extends('layouts.master')

@section('contenido')
    <div class="cabecera-titulo">
        <div class="container">
            <div class="row">
                <h2>Modifica los datos de tu representado.</h2>
            </div>
        </div>
    </div>
    <div class="container" id="cuerpo">
        <div class="row">
            <form class="col-xs-12">
                <hr>
                <h4>Infomación personal</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="Juan Esteban">
                    </div>
                    <div class="col-xs-4">
                        <label for="apellido">Apellido</label>
                        <input type="text" class="form-control" value="Sánchez Rodriguez">
                    </div>
                    <div class="col-xs-4">
                        <label for="nombre">Fecha de Nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control" value="14/09/2010">

                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label for="nombre">Situación Actual</label>
                        <textarea class="form-control" rows="3">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibhnec urna.</textarea>
                    </div>
                </div>
                <hr>
                <h4>Tipos de cáncer que padece</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="tipo">Tipo</label>
                        <input type="text" class="form-control" value="Páncreas">
                    </div>
                    <div class="col-xs-4">
                        <label for="situacion-actual">Situación actual</label>
                        <input type="text" class="form-control" value="Metástasis">
                    </div>
                    <div class="col-xs-4">
                        <label for="nombre">Fecha de diagnóstico</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control" value="20/01/2016">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <select name="tipo" class="form-control selectpicker" data-live-search="true" title="Tipo de cáncer">
                            <option value="1">Pulmon</option>
                            <option value="2">Leucemia</option>
                            <option value="3">Pancreas</option>
                            <option value="4">Garganta</option>
                            <option value="5">Tiroides</option>
                            <option value="6">Colon</option>
                            <option value="7">Higado</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" placeholder="Estado Actual">
                    </div>
                    <div class="col-xs-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <h4>Estado TNM (Opcional)</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="TNM_T">Tumor primario (T)</label>
                        <select name="TNM_T" class="form-control selectpicker" data-live-search="true" title="TNM_Tx">
                            <option value="1">TX</option>
                            <option value="2">T0</option>
                            <option value="3">Tis</option>
                            <option value="4">T1</option>
                            <option value="5">T2</option>
                            <option value="6">T3</option>
                            <option value="7">T4</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="TNM_N">Ganglios linfáticos (N)</label>
                        <select name="TNM_N" class="form-control selectpicker" data-live-search="true" title="TNM_Nx">
                            <option value="1">NX</option>
                            <option value="2">N0</option>
                            <option value="3">N1</option>
                            <option value="4">N2</option>
                            <option value="5">N3</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="TNM_M">Metástasis distante (M)</label>
                        <select name="TNM_M" class="form-control selectpicker" data-live-search="true" title="TNM_Mx">
                            <option value="1">MX</option>
                            <option value="2">M0</option>
                            <option value="3">M1</option>
                        </select>
                    </div>
                </div>
                <hr>
                <h4>Medicamentos que requiere el niño</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="tipo">Medicamento</label>
                        <input type="text" class="form-control" value="Atamel">
                    </div>
                    <div class="col-xs-4">
                        <label for="estado_actual">Dosis / Cantidad (Opcional)</label>
                        <input type="text" class="form-control" value="650 ml">
                    </div>
                    <div class="col-xs-4">
                        <label for="nombre">Fecha de donación</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4">
                    <select name="tipo" class="form-control selectpicker" data-live-search="true" title="Medicamento">
                            <option value="1">Pulmon</option>
                            <option value="2">Leucemia</option>
                            <option value="3">Pancreas</option>
                            <option value="4">Garganta</option>
                            <option value="5">Tiroides</option>
                            <option value="6">Colon</option>
                            <option value="7">Higado</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <input type="text" class="form-control" placeholder="Opcional">
                    </div>
                    <div class="col-xs-4">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control datapicker">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Insumos que requiere el niño</h4>

                <div class="row form-group">
                    <div class="col-xs-3">
                        <label for="categoria">Categoria</label>
                        <input type="text" class="form-control" value="Atamel">
                    </div>
                    <div class="col-xs-3">
                        <label for="estado_actual">Insumo</label>
                        <input type="text" class="form-control" value="650 ml">
                    </div>
                    <div class="col-xs-3">
                        <label for="nombre">Fecha de donación</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <label for="nombre">Motivo</label>
                        <input type="text" class="form-control" placeholder="Motivo">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-3">
                    <select name="tipo" class="form-control selectpicker" data-live-search="true" title="Categoria de insumo">
                            <option value="1">Pulmon</option>
                            <option value="2">Leucemia</option>
                            <option value="3">Pancreas</option>
                            <option value="4">Garganta</option>
                            <option value="5">Tiroides</option>
                            <option value="6">Colon</option>
                            <option value="7">Higado</option>
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col-xs-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" class="form-control" placeholder="Motivo">
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <buttom class="btn btn-deafult btn-block btn-md button-reg">Actualizar</buttom>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection