@foreach($nino->medicamentos as $med)
    @if($med->estado_requerimiento == 'Requerido')
        {{ $med->medicamento->nombre }},
    @endif
@endforeach
@foreach($nino->insumos as $ins)
    @if($ins->estado_requerimiento == 'Requerido')
        {{ $ins->nombre }},
    @endif
@endforeach