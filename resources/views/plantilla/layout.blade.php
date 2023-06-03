<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IN |  @yield('titulo', 'Inicio')</title>

    <link href="{{ URL::asset('css/navegacion.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet" />


</head>
<body>

    @include('plantilla/navegacion')
    <main>
        @include('plantilla/encabezado')
        @yield('plantilla')
    </main>

    <script src="https://kit.fontawesome.com/67609a736e.js" crossorigin="anonymous"></script>

</body>
</html>
