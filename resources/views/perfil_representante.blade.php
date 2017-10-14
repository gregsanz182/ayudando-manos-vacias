@extends('layouts.master')

@section('contenido')
    <div class="container" id="cuerpo">
        <div class="row">
            <hr>
            <div class="col-xs-6">
                <h4>Información personal</h4>
                <div class="row form-group">
                    <div class="col-xs-3">
                        <label for="nombre">Nombre: Gregory</label>
                    </div>
                    <div class="col-xs-3">
                        <label for="apellido">Apellido: Sánchez</label>
                    </div>
                    <div class="col-xs-5">
                        <label for="nombre">Correo: gregory@unet.edu.ve</label>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <h4>Información del Niño</h4>
                <div class="row form-group">
                    <div class="list-group list-group-card">
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading" style="margin-bottom: 12px;">José Hernadez</h4>
                            <p class="list-group-item-text"><strong>Ubicación:</strong> Cárdenas, Táchira</p>
                            <p class="list-group-item-text"><strong>Teléfono representante:</strong> 0277-5554455</p>
                            <p class="list-group-item-text"><strong>Cancer:</strong> Leucemia</p>
                            <p class="list-group-item-text"><strong>Estado Actual:</strong> Grave</p>
                            <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> Jeringas. Pañales. Ibuprofeno.</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="row form-group">
                </div>
            </div>
        </div>
    </div>
@endsection