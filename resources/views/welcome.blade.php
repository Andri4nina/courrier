<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset( 'fontawesome-free-6.4.0-web/css/all.min.css') }}">
        <title>Laravel</title>
        <script src="{{ asset('js/app.js') }}" defer></script>

        @vite('resources/css/app.css')
    </head>
    <body class="bg-slate-900 antialiased">
    <section class="w-full min-h-screen">
        @yield('content')
    </section>

    </body>
</html>
