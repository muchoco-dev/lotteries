<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <script src="{{ secure_asset('js/app.js') }}?{{ time() }}" defer></script>
        <link href="{{ secure_asset('css/app.css') }}?{{ time() }}" rel="stylesheet">

        @yield('head')
    </head>
    <body>
        <div id="app">
            <header class="m-4">
                <h1><a class="text-dark h4" href="{{ secure_url('/') }}">{{ config('app.name') }}</a></h1>
            </header>
            <main>
                @yield('content')
            </main>
            <footer class="text-center mt-5">
                &copy; <a class="text-body" href="https://lachelier.com" target="_blank" rel="noopener">Lachelier LLP</a>
            </footer>
        </div>
    </body>
</html>
