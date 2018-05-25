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
                @if(!Auth::guest())
                <a id="sidebarCollapse" >
                    <div class="navbar-toggler-icon rotate"></div>
                </a>
                @endif
            </ul>


            <date></date>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto" style="margin: 0; padding: 0; height:auto">
                <!-- Authentication Links -->
                @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                @else
                    <li>
                        <a href="#">
                            <span class="fa fa-cogs"></span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
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