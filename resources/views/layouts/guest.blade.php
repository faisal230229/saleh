<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('layouts.partials.head')
    </head>
    <body class="font-sans text-gray-900 antialiased">
    <div class="app auth_app" id="app">
        @yield('content')
    </div>
    @include('layouts.partials.foot')
    </body>
</html>
