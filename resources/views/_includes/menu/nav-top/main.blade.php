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
                    <span class="fa fa-bars"></span>
                </button>
                <bars></bars>
            </ul>

            {{--Clock--}}
            <clock></clock>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">UA <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a>UA</a></li>
                            <li><a>RU</a></li>
                            <li><a>ENG</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">
                            <span class="fa fa-cogs"></span>
                        </a>
                    </li>
                    <li onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <a href="{{ route('logout') }}">
                            <span class="fa fa-sign-out"></span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>