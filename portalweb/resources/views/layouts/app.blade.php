<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Darwin Colombia</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myanimation.css') }}">

    <link rel="stylesheet" href="{{ asset('css/darwinperennialswebflow.css') }}">
    <link rel="stylesheet" href="{{ asset('css/webflow.css') }}">

    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <script src="{{ asset('js/modernizr.js') }}" defer></script>
    <script src="{{ asset('js/webflow.js') }}" defer></script>
</head>
<body>
    <div id="app">

        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>

