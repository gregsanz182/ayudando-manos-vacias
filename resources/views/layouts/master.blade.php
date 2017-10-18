<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    @include ("includes/headLinks")
    <title>Ayudando Manos Vacias - Inicio</title>
</head>
<body>
    @include('includes.header')

    @yield('contenido')

    @include('includes.footer')

    @include('includes/scriptLinks')
    <script>
        var token = '{{ Session::token() }}';
    </script>
</body>
</html>
