<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">
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
                    <a class="navbar-brand text-uppercase" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    @if (! Auth::guest())
                    <div class="input-group">
                        <form class="navbar-form" role="search" method="get" id="search-form" name="search-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Telusuri Kontak..." id="query" name="query" value="">
                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><span class="fa fa-fw fa-search"></span></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    @endif
                </div>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (! Auth::guest())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fa fa-fw fa-sign-out"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <div class="container">
        <div class="row">
                @if (! Auth::guest())
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item active">Semua Kontak <span class="badge">10</span></a>
                    <a href="#" class="list-group-item">Keluarga <span class="badge">4</span></a>
                    <a href="#" class="list-group-item">Teman <span class="badge">3</span></a>
                    <a href="#" class="list-group-item">Lain lain <span class="badge">3</span></a>
                </div>
            </div>
                @endif
            <div class="col-md-9">
                @yield('content')        
            </div>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script>
        $('#add-new-group').hide();
        $('#add-group-btn').click(function(){
            $('#add-new-group').slideToggle(function(){
                $('#new-group').focus();
            });
            return false;
        });
    </script>
</body>
</html>
