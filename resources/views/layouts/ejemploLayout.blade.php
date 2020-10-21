<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Nombre App - @yield('titulo')</title>
</head>

<body>
    @section('barralateral')
        Esto es la barra lateral
    @show

    <div class="container">
        @yield('contenido')
    </div>

</body>

</html>