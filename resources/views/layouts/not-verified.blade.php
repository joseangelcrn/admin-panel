<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


</head>
<body id="page-top">
    <div id="app">
        @include('modules.menu-bar-top')
        @yield('content')
    </div>

    <script src="{{ asset('js/jquery/jquery.js') }}" ></script>
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}" ></script>
    <script src="{{ asset('js/sb-admin-2.js') }}" ></script>

</body>
</html>
