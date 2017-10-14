@extends('layouts.master')

@section('contenido')
    <div class="cabecera-titulo">
        <div class="container">
            <div class="row">
                <h2>Registro de representado</h2>
            </div>
        </div>
    </div>

    <div class="container" id="cuerpo">
        <div class="row">
            <div class="col-xs-4 reg-desc">
                <h3>Registra a tu hijo o representado.</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh
                    nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin
                    laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                    Suspendisse potenti.</p>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi
                    purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit
                    tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                    eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi
                    purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit
                    tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                    eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
            </div>
            <form class="col-xs-7 col-xs-offset-1 form-custom">
                <h4>Información personal</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" placeholder="Primer nombre">
                    </div>
                    <div class="col-xs-4">
                        <label for="nombre">Apellido</label>
                        <input type="text" class="form-control" placeholder="Primer apellido">
                    </div>
                    <div class="col-xs-4">
                        <label for="nombre">Fecha de nacimiento</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <label for="nombre">Situación Actual</label>
                        <textarea class="form-control" rows="5" placeholder="Breve narración de la situación actual del niño"></textarea>
                    </div>
                </div>
                <hr>
                <h4>Tipos de cáncer que padece</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="tipo">Tipo</label>
                        <select name="tipo" class="form-control">
                        <option selected>Seleccione un tipo</option>
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
                        <label for="estado_actual">Estado Actual</label>
                        <input type="text" class="form-control" placeholder="Estado Actual">
                    </div>
                    <div class="col-xs-4">
                        <label for="nombre">Fecha de diagnóstico</label>
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
                        <select name="TNM_T" class="form-control">
                        <option selected>Seleccione un estado</option>
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
                        <select name="TNM_N" class="form-control">
                        <option selected>Seleccione un estado</option>
                        <option value="1">NX</option>
                        <option value="2">N0</option>
                        <option value="3">N1</option>
                        <option value="4">N2</option>
                        <option value="5">N3</option>
                    </select>
                    </div>
                    <div class="col-xs-4">
                        <label for="TNM_M">Metástasis distante (M)</label>
                        <select name="TNM_M" class="form-control">
                        <option selected>Seleccione un estado</option>
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
                        <select name="tipo" class="form-control">
                        <option selected>Seleccione un tipo</option>
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
                        <label for="estado_actual">Dosis / Cantidad (Opcional)</label>
                        <input type="text" class="form-control" placeholder="Opcional">
                    </div>

                    <div class="col-xs-4">
                        <label for="nombre">Fecha de donación</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <hr>
                <h4>Insumos que requiere el niño</h4>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="tipo">Categoria</label>
                        <select name="tipo" class="form-control">
                        <option selected>Seleccione un tipo</option>
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
                        <label for="estado_actual">Insumo</label>
                        <input type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="col-xs-4">
                        <label for="estado_actual">Motivo (Opcional)</label>
                        <input type="text" class="form-control" placeholder="Motivo">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4">
                        <label for="nombre">Fecha de donación</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
                            <input type="date" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <buttom class="btn btn-deafult btn-block btn-md button-reg">Registrar</buttom>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection