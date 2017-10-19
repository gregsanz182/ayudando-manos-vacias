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
            <form class="col-xs-4" method='get' action=''>
                <label>Ubicación</label>
                <div class="row form-group">
                    <div class="col-xs-6">
                        <select name="estado" class="form-control" id='estado_select' title="Estado">
                            <option selected>Estado</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}" @if($old['estado']==$estado->id){{'selected'}}@endif>{{ $estado->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-xs-6">
                        <select name="municipio" class="form-control" id='ciudad_select' title="Municipio">
                            <option selected>Municipio</option>
                            @foreach($municipios as $municipio)
                                <option value="{{ $municipio->id }}" @if($old['municipio']==$municipio->id){{'selected'}}@endif>{{ $municipio->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <label>Tipo de cáncer</label>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <select name="cancer" class="form-control selectpicker" data-live-search="true" title="Tipo de Cáncer">
                            @foreach($canceres as $cancer)
                                <option value="{{ $cancer->id }}" @if($old['cancer']==$cancer->id){{'selected'}}@endif>{{ $cancer->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <label>Medicamentos</label>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <select name="medicamentos" class="form-control selectpicker" data-live-search="true" title="Tipo de Medicamento">
                            @foreach($medicamentos as $medicamento)
                                <option value="{{ $medicamento->id }}" @if($old['medicamentos']==$medicamento->id){{'selected'}}@endif>{{ $medicamento->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <label>Insumos (Categoría)</label>
                <div class="row form-group">
                    <div class="col-xs-12">
                        <select name="insumos" class="form-control selectpicker" data-live-search="true" title="Categoría">
                            @foreach($insumos_cat as $insumo_cat)
                                <option value="{{ $insumo_cat->id }}" @if($old['insumos']==$insumo_cat->id){{'selected'}}@endif>{{ $insumo_cat->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="row form-group">
                    <div class="col-xs-4 col-xs-offset-4">
                        <button class="btn btn-default button-reg btn-block btn-md" type="submit">Buscar</button>
                    </div>
                </div>
            </form>
            <div class="col-xs-6 col-xs-offset-1 form-custom">
                <div class="list-group list-group-card">
                    @foreach($ninos as $nino)
                        <a href="#" class="list-group-item">
                            <h4 class="list-group-item-heading" style="margin-bottom: 12px;">{{ $nino->nombre }} {{ $nino->apellido }}</h4>
                            <p class="list-group-item-text"><strong>Ubicación:</strong> {{ $nino->representante->localidad->nombre }}, {{ $nino->representante->localidad->estado->nombre }}</p>
                            <p class="list-group-item-text"><strong>Teléfono representante:</strong> {{ $nino->representante->telefono }}</p>
                            <p class="list-group-item-text"><strong>Cancer:</strong> @include('includes.cancer_por_nino')</p>
                            <p class="list-group-item-text"><strong>Situación Actual:</strong> {{ $nino->situacion_actual }}</p>
                            <p class="list-group-item-text"><strong>Medicamentos e insumos que requiere:</strong> @include('includes.insumos_medicamentos_por_nino')</p>
                        </a>
                    @endforeach
                </div>
                {{ $ninos->links() }}
            </div>
        </div>
    </div>
    <script>
        var cityUrl = "{{ route('obtener_ciudades') }}";
    </script>
@endsection