<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/swiper-bundle.min.js') }}"defer></script>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-900">
    <section class="w-full  min-h-screen">
        @yield('content')
    </section>

    </body>
</html>
