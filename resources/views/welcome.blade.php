<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <link rel="stylesheet" href="{{asset('css/clock.css')}}">

        @vite(['resources/css/app.css','resources/js/app.js'])
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body class="bg-slate-900">
    <section class="w-full  min-h-screen">
        @yield('content')
    </section>

    </body>


</html>
