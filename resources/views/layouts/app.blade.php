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
            <header>
                <h1>{{ config('app.name') }}</h1>
            </header>
            <main>
                @yield('content')
            </main>
            <footer>
                &copy; <a href="https://lachelier.com" target="_blank" rel="noopener">Lachelier LLP</a>
            </footer>
        </div>
    </body>
</html>
