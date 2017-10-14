@extends('layouts.master')

@section('contenido')
    <div class="cabecera-titulo">
        <div class="container">
            <div class="row">
                <h2>Encuentra niños que puedan necesitar tu ayuda.</h2>
            </div>
        </div>
    </div>

    <div class="container" id="cuerpo">
        <div class="row reg-desc">
            <h3>¿Tienes medicamentos o insumos que no usarás? !Donalos!... ¡Sé una mano amiga!</h3>
            <p>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Phasellus hendrerit. Pellentesque aliquet nibh
                    nec urna. In nisi neque, aliquet vel, dapibus id, mattis vel, nisi. Sed pretium, ligula sollicitudin
                    laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo.
                    Suspendisse potenti.</p>
                <p>Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus libero eu augue. Morbi
                    purus libero, faucibus adipiscing, commodo quis, gravida id, est. Sed lectus. Praesent elementum hendrerit
                    tortor. Sed semper lorem at felis. Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui,
                    eu pulvinar nunc sapien ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna.</p>
            </p>
        </div>
        <div class="row">
            <div class="col-xs-4">
                <label>Ubicación</label>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <select name="estado" class="form-control selectpicker" data-live-search="true" title="Estado">
                            <option value="1">Amazonas</option>
                            <option value="2">Apure</option>
                            <option value="3">Carabobo</option>
                            <option value="4">Lara</option>
                            <option value="5">Mérida</option>
                            <option value="6">Táchira</option>
                            <option value="7">Zulia</option>
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <select name="municipio" class="form-control selectpicker" data-live-search="true" title="Municipio">
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

                <label>Tipo de cáncer</label>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <select name="cancer" class="form-control selectpicker" data-live-search="true" title="Tipo de Cáncer">
                            <option value="1">Leucemia</option>
                            <option value="2">Pancreas</option>
                            <option value="3">Colon</option>
                            <option value="4">Prostata</option>
                        </select>
                    </div>
                </div>

                <label>Medicamentos</label>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <select name="medicamentos" class="form-control selectpicker" data-live-search="true" title="Tipo de Medicamento">
                            <option value="1">Atamel</option>
                            <option value="2">Vitaminas</option>
                            <option value="3">Tensión</option>
                        </select>
                    </div>
                </div>

                <label>Insumos (Categoria)</label>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <select name="insumos" class="form-control selectpicker" data-live-search="true" title="Categoria">
                            <option value="1">Quirurgicos</option>
                            <option value="2">Cama</option>
                        </select>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn btn-default button-reg btn-block btn-md" action="">Buscar</button>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-xs-offset-1 form-custom">
                <div class="list-group list-group-card">
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading" style="margin-bottom: 12px;">José Hernadez</h4>
                        <p class="list-group-item-text"><strong>Ubicación:</strong> Cárdenas, Táchira</p>
                        <p class="list-group-item-text"><strong>Teléfono representante:</strong> 0277-5554455</p>
                        <p class="list-group-item-text"><strong>Cancer:</strong> Leucemia</p>
                        <p class="list-group-item-text"><strong>Estado Actual:</strong> Grave</p>
                        <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> Jeringas. Pañales. Ibuprofeno.</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading" style="margin-bottom: 12px;">Carlos Chacón</h4>
                        <p class="list-group-item-text"><strong>Ubicación:</strong> Maracaibo, Zulia</p>
                        <p class="list-group-item-text"><strong>Teléfono representante:</strong> 0277-5554455</p>
                        <p class="list-group-item-text"><strong>Cancer:</strong> Leucemia</p>
                        <p class="list-group-item-text"><strong>Estado Actual:</strong> Grave</p>
                        <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> Jeringas. Pañales. Ibuprofeno.</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading" style="margin-bottom: 12px;">Daniela Díaz</h4>
                        <p class="list-group-item-text"><strong>Ubicación:</strong> San Crstóbal, Táchira</p>
                        <p class="list-group-item-text"><strong>Teléfono representante:</strong> 0277-5554455</p>
                        <p class="list-group-item-text"><strong>Cancer:</strong> Leucemia</p>
                        <p class="list-group-item-text"><strong>Estado Actual:</strong> Grave</p>
                        <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> Jeringas. Pañales. Ibuprofeno.</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading" style="margin-bottom: 12px;">Karina Zambrano</h4>
                        <p class="list-group-item-text"><strong>Ubicación:</strong> Valencia, Carabobo</p>
                        <p class="list-group-item-text"><strong>Teléfono representante:</strong> 0277-5554455</p>
                        <p class="list-group-item-text"><strong>Cancer:</strong> Leucemia</p>
                        <p class="list-group-item-text"><strong>Estado Actual:</strong> Grave</p>
                        <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> Jeringas. Pañales. Ibuprofeno.</p>
                    </a>
                    <a href="#" class="list-group-item">
                        <h4 class="list-group-item-heading" style="margin-bottom: 12px;">Jesús Sánchez</h4>
                        <p class="list-group-item-text"><strong>Ubicación:</strong> Mérida, Mérida</p>
                        <p class="list-group-item-text"><strong>Teléfono representante:</strong> 0277-5554455</p>
                        <p class="list-group-item-text"><strong>Cancer:</strong> Leucemia</p>
                        <p class="list-group-item-text"><strong>Estado Actual:</strong> Grave</p>
                        <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> Jeringas. Pañales. Ibuprofeno.</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
@endsection