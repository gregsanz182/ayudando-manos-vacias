<?php $conteo = count($nino->canceres) ?>
@foreach($nino->canceres as $can)
    {{ $can->cancer->nombre }}@if($conteo-- > 1),@endif 
@endforeach