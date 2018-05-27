<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'IIB') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>
<body>
<div id="app">
    {{--Nav Top--}}
    @include('_includes.menu.nav-top.main')

    <div class="wrapper">
        {{--Nav left--}}
        @include('_includes.menu.nav-left.main')
        {{--Flash messages--}}
        <div class="container-fluid">
            @include('_includes.notifications.messages')
            {{--Content--}}
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>
    @include('_includes.footer.main')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('scripts')

</body>
</html>
