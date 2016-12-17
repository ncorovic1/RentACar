<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('title')

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    
    @yield('style')
    <style>
        .navbar-brand {
            float: left;
            padding: 14px 15px;
            font-size: 14px;
            line-height: 22px;
            height: 50px;
        }
        .carousel-control.left, .carousel-control.right{ 
            background: none !important;
            filter: progid:none !important;
            color: black;
        }
    </style>
    
    <!-- Fonts -->
    @yield('font')

    <!-- Scripts -->
    
    @yield('script')
    <script>
            window.Laravel = {{ json_encode(['csrfToken' => csrf_token()]) }};
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Branding Image -->
                    @if (Auth::user())
                            <a class="navbar-brand" href="{{ route('welcome') }}">
                                Home
                            </a>
                        @if (Auth::user()->operator)
                            <a class="navbar-brand" href="{{ route('register') }}">
                                Register User
                            </a>
                            <a class="navbar-brand" href="{{ route('nalozi') }}">
                                Suspend User
                            </a>
                            <a class="navbar-brand" href="{{ route('registerVehicle') }}">
                                Register Vehicle
                            </a>
                            <a class="navbar-brand" href="{{ route('purchaseVehicle') }}">
                                Purchase Vehicle
                            </a>
                            <a class="navbar-brand" href="{{ route('browseVehicles') }}">
                                Browse Company Vehicles
                            </a>
                        @else
                            <a class="navbar-brand" href="{{ route('renting') }}">
                                Rent a Car
                            </a>
                            <a class="navbar-brand" href="{{ route('pregled') }}">
                                My Cars
                            </a>
                        @endif
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            
                        @else
                            <li class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
