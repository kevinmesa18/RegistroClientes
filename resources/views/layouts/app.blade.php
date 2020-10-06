<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" defer></script>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Icons -->
    <script src="https://kit.fontawesome.com/9fd7271068.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-info shadow-sm">
            <div class="container">
                <div class="navbar-brand text-white">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ url('/home') }}"><i class="fas fa-home"></i> Inicio</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/cities') }}"><i class="fas fa-city"></i> Ciudades</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/clients') }}"><i class="fas fa-user-friends"></i> Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/users') }}"><i class="fas fa-users"></i> Usuarios</a></li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            <div class="container text-white text-right">
                <h5>Bienvenido {{ Auth::user()->name }}</h5>
            </div>
            <br>
            @yield('content')
        </main>
    </div>
</body>
</html>
