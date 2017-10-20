<?php $conteo = count($nino->medicamentos) + count($nino->insumos) ?>
@foreach($nino->medicamentos as $med)
    {{ $med->medicamento->nombre }}@if($conteo-- > 1),@endif 
@endforeach
@foreach($nino->insumos as $ins)
    {{ $ins->nombre }}@if($conteo-- > 1),@endif 
@endforeach