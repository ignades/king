<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md sticky-top navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{URL::asset('/images/logo-1.png')}}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav flex-row mb-2">
                        <li class="nav-item">
                            <a class="nav-link py-1 pr-3" href="#"><i class="fa fa-facebook">xx</i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-1 pr-3" href="#"><i class="fa fa-instagram"></i>xx</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-1 pr-3" href="#"><i class="fa fa-twitter"></i>xx</a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <ul  class="nav navbar-nav home_login p-2">
                                    <li class="nav-item "><a href="#"   title="settings"><i
                                        class="fa fa-cog fa-fw fa-lg"></i></a></li>
                                    <li class="dropdown order-1">
                                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary-accedi btn-success text-white dropdown-toggle"> Accedi <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right mt-6">
                                            <li class="px-3 py-4">
                                            <form class="form" role="form">
                                                <div class="form-group">
                                                <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text"
                                                    required="">
                                                </div>
                                                <div class="form-group">
                                                <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text"
                                                    required="">
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                                </div>
                                                <div class="form-group text-center">
                                                <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                                                </div>
                                            </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif

                            @if (Route::has('register'))
                                <ul class="nav navbar-nav ml-auto home_login p-2">
                                    <li class="nav-item  "><a href="#"   title="settings"><i
                                        class="fa fa-cog fa-fw fa-lg"></i></a></li>
                                    <li class="dropdown order-1">
                                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn  btn-outline-secondary-register dropdown-toggle"> Registrati <span class="caret"></span></button>
                                        <ul class="dropdown-menu dropdown-menu-right mt-6">
                                            <li class="px-3 py-4">
                                            <form class="form" role="form">
                                                <div class="form-group">
                                                <input id="emailInput" placeholder="Email" class="form-control form-control-sm" type="text"
                                                    required="">
                                                </div>
                                                <div class="form-group">
                                                <input id="passwordInput" placeholder="Password" class="form-control form-control-sm" type="text"
                                                    required="">
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                                                </div>
                                                <div class="form-group text-center">
                                                <small><a href="#" data-toggle="modal" data-target="#modalPassword">Forgot password?</a></small>
                                                </div>
                                            </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- FOOTER -->
    <footer>
    @include('includes.footer')
    </footer>
</body>
</html>
