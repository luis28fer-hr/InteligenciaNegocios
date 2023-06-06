<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>IN | @yield('titulo', 'Inicio')</title>

    <link href="{{ URL::asset('css/navegacion.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('css/cuentaT.css') }}" rel="stylesheet" />

    <link rel="icon" href="{{ asset('../img/ING.png') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>
    @if (session()->has('bienvenida'))
        {!! "<script> Swal.fire({
                    icon: 'success',
                    title: '¡Bienvenido!',
                    text: '¡Inicio session exitosamente!',
                    })</script> " !!}
    @endif

    @include('plantilla/navegacion')
    <main>
        @include('plantilla/encabezado')
        @yield('plantilla')
    </main>

    <script src="https://kit.fontawesome.com/67609a736e.js" crossorigin="anonymous"></script>

</body>

</html>
