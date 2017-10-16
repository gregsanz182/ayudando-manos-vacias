@foreach($usuario as $user)
    {{$user->rol->nombre;}}

 @endforeach
@foreach($mensajes as $mensaje)
    <ul>
        <li>{{ $mensaje->mensaje }}</li>
        <li>{{ $mensaje->fecha }}</li>
        <li>{{ $mensaje->nino->nombre }}</li>
        <li>{{ $mensaje->nino->canceres->first()->cancer->nombre }}</li>
        <li>{{ $mensaje->nino->representante->nombre }}</li>
        <li>{{ $mensaje->nino->representante->localidad->nombre }}</li>
        <li>{{ $mensaje->nino->representante->localidad->estado->nombre }}</li>
    </ul>
@endforeach