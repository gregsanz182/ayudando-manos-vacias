
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ URL::to('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::to('bootstrap-select-1.12.4/dist/css/bootstrap-select.min.css') }}">
    <title>Ayudando Manos Vacias - Inicio</title>
</head>
<body>
    @include('includes.header')

    @yield('contenido')

    @include('includes.footer')

    <script src="{{ URL::to('jquery/jquery-3.2.1.slim.min.js') }}"></script>
    <script src="{{ URL::to('popper.js/popper.min.js') }}"></script>
    <script src="{{ URL::to('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('js/script.js') }}"></script>
    <script src="{{ URL::to('bootstrap-select-1.12.4/dist/js/i18n/bootstrap-select.min.js') }}"></script>
</body>
</html>
