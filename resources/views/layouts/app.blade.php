@php
    app()->setLocale(session()->get('locale') ?? app()->getLocale())
@endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('layouts.partials.head')
        <!-- Scripts -->

    </head>
    <body class="font-sans antialiased">
    <div class="app" id="app">
        @include('layouts.partials.menu')

        <div id="content" class="app-content box-shadow-z0" role="main">
            @include('layouts.partials.header')
            @include('layouts.partials.footer')
            <div ui-view class="app-body" id="view">
{{--                @include('layouts.partials.errors')--}}
                {{ $slot }}
            </div>
        </div>

{{--        @include('layouts.partials.settings')--}}
    </div>
    @include('layouts.partials.foot')
    </body>
</html>
