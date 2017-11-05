<?php $conteo = count($nino->medicamentosRequeridos) + count($nino->insumosRequeridos) ?>
@foreach($nino->medicamentosRequeridos as $med)
    {{ $med->medicamento->nombre }} ({{$med->cantidad}})@if($conteo-- > 1),@endif 
@endforeach
@foreach($nino->insumosRequeridos as $ins)
    {{ $ins->nombre }} ({{$ins->cantidad}})@if($conteo-- > 1),@endif 
@endforeach