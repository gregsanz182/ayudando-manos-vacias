<nav class="navbar navbar-default navbar-fixed-top navbar-home">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inicio') }}">
                    <img src="{{ URL::to('img/logo.png') }}" alt="Inicio" class="logo-img">
                </a>
            </div>
            <div class="col-xs-12 header-right">
                <div class="row header-row">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('inicio') }}" class={{ Route::currentRouteName()=="inicio"?"active":"" }}><i class="fa fa-home"></i> Inicio</a>
                        </li>
                        <li>
                            <a href="{{ route('buscar') }}" class={{ Route::currentRouteName()=="buscar"?"active":"" }}><i class="fa fa-search"></i> Buscar</a>
                        </li>
                        @if(Auth::check())
                            @if (Auth::user()->rol_type == "App\Representante")
                                <li>
                                    <a href="{{ route('registro_nino') }}" class={{ Route::currentRouteName()=="registro_nino"?"active":"" }}><i class="fa fa-users"></i> Registrar niño</a>
                                </li>
                                <li>
                                    <a href="{{ route('bandeja', ['id' => Auth::user()->rol_id]) }}" class={{ Route::currentRouteName()=="bandeja"?"active":"" }}><i class="fa fa-inbox"></i> Buzon de mensajes</a>
                                </li>
                            @elseif(Auth::check())
                                <li>
                                    <a href="{{ route('admin') }}" class={{ Route::currentRouteName()=="admin"?"active":"" }}><i class="fa fa-unlock-alt"></i> Operaciones de Admin</a>
                                </li>
                            @endif
                        @endif
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i> {{Auth::user()->rol->nombre}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @if (Auth::user()->rol_type == "App\Representante")
                                        <li><a href="{{ route('info-rep', ['id' => Auth::user()->rol->id]) }}"><i class="fa fa-user"></i> Ver perfil</a></li>
                                        <li><a href="{{ route('ver-perfil') }}"><i class="fa fa-id-badge"></i> Editar perfil</a></li>
                                    @else
                                         <li><a href="{{ route('admin') }}"><i class="fa fa-id-badge"></i> Editar perfil</a></li>
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ route('salir') }}"><i class="fa fa-sign-out"></i> Salir</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <b>Inicia Sesión</b>
                                    <span class="caret"></span>
                                </a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <div class="row">
                                            <form action="{{ route('ingresar') }}" class="login-form" method='post'>
                                                <h4>Ingresa con tu cuenta</h4>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                                        <input type="text" class="form-control" placeholder="Usuario" name="log-user-input" id="log-user-input">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                        <input type="password" class="form-control" placeholder="Contraseña" name="log-pass-input" id="log-pass-input">
                                                    </div>
                                                </div>
                                                <div class="alert alert-danger" role="alert" id="log-alert" hidden></div>
                                                <button type="submit" class="btn btn-default boton-login" id='boton-login'>Ingresar</button>
                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            </form>
                                        </div>
                                        <div class="row foot">
                                            <span>¿No tienes cuenta? <a href="{{ route('registro') }}">Registrate</a></span>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<script>
    var token = '{{ Session::token() }}';
    var in_url = '{{ route("ingresar") }}'
</script>