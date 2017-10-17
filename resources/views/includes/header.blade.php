<nav class="navbar navbar-default navbar-fixed-top navbar-home">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="{{ route('inicio') }}">
                    <img src="img/logo.png" alt="Inicio" class="logo-img">
                </a>
            </div>
            <div class="col-xs-12 header-right">
                <div class="row header-row">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="{{ route('inicio') }}" class="active">Inicio</a>
                        </li>
                        <li>
                            <a href="buscar">Buscar</a>
                        </li>
                        <li>
                            <a href="ayuda">Ayuda</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li>
                                <a href="{{ route('salir') }}">Salir</a>
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