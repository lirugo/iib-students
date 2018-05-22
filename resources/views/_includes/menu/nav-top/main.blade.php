<nav class="navbar navbar-expand-md navbar-default">
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
                @if(!Auth::guest())
                <a id="sidebarCollapse" >
                    <div class="navbar-toggler-icon rotate"></div>
                </a>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li class="nav-item">
                        <a href="#" class="m-r-15">
                            <span class="fa fa-cogs"></span>
                        </a>
                        <a href="{{ route('logout') }}"  class="m-r-15"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
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