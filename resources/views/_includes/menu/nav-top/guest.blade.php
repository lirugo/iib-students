<nav class="navbar navbar-expand-md navbar-default" style=" padding-top: 0;padding-bottom: 0;">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--{{ config('app.name', 'IIB') }}--}}
                <img src="/img/logo/logo.jpg" width="50px;"/>
            </a>
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                    <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
            </ul>
        </div>
    </div>
</nav>