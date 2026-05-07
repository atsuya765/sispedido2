<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Restaurante</title>
    <link rel="shortcut icon" href="{{ asset('plugins/images/favicon.ico') }}" type="image/x-icon">
    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="{{ asset('css/clientcss/normalize.css') }}">

    <!-- MDBootstrap V5 -->
    <link rel="stylesheet" href="{{ asset('css/clientcss/mdb.min.css') }}">

    <!-- Font Awesome V5.15.1 -->
    <link rel="stylesheet" href="{{ asset('css/clientcss/all.css') }}">

    <!-- Sweet Alert V10.13.0 -->
    <script src="{{ asset('js/clientjs/sweetalert2.js') }}"></script>

    <!-- General Styles -->
    <link rel="stylesheet" href="{{ asset('css/clientcss/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/solid.min.css"
        integrity="sha512-6/gTF62BJ06BajySRzTm7i8N2ZZ6StspU9uVWDdoBiuuNu5rs1a8VwiJ7skCz2BcvhpipLKfFerXkuzs+npeKA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <!-- Header -->
    <header class="header full-box" style="background-color: #964B00">
        <div class="header-brand text-center full-box">
            <a href="{{ url('/') }}">
                <img src="{{ asset('plugins/images/z.png') }}" width="50px" alt="logo"
                    style="border-radius:5px">
            </a>
        </div>

        <div class="header-options full-box">
            <nav class="header-navbar full-box poppins-regular font-weight-bold">
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="{{ url('/') }}" style="font-size: 20px" class="text-white"> Inicio<span
                                class="full-box"></span></a>
                    </li>
                    <li>
                        <a href="{{ route('client.menu') }}" style="font-size: 20px" class="text-white">Menú<span
                                class="full-box"></span></a>
                    </li>
                </ul>
            </nav>
            <div class="header-button full-box text-center btn-login-menu text-white">
                @if (Route::has('login'))
                    @auth
                        <i class="fas fa-user-check" onclick="show_popup_login()" data-mdb-toggle="tooltip"
                            data-mdb-placement="bottom" title="Login"></i>
                    @else
                        <i class="fas fa-user-alt" onclick="show_popup_login()" data-mdb-toggle="tooltip"
                            data-mdb-placement="bottom" title="Login"></i>
                    @endauth
                    <div class="div-bordered popup-login">
                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                            @auth
                                <pre> User: {{ Auth::user()->name }}</pre>
                                <a href="{{ url('/') }}" class="btn btn-primary rounded"><i class="fas fa-home"></i>
                                    Home </a>
                                <a class="btn btn-danger" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-in-alt">&nbsp; </i>Salir
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}">
                                    <p class="card-text lead"><span class="badge bg-primary"> <i
                                                class="fas fa-sign-in-alt">&nbsp; </i>Iniciar sesión</span></p>
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}">
                                        <p class="card-text lead"><span class="badge bg-success"> <i
                                                    class="fas fa-registered">&nbsp; </i>Registrarse</span></p>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                @endif
            </div>
            <a href="{{ route('client.carrito') }}" class="header-button full-box text-center text-white"
                data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Carrito">
                <i class="fas fa-shopping-cart"></i>
                <span id="contador" class="badge  rounded-pill bag-count invisible">0</span>
            </a>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="footer text-white" style="background-color: #3A4C8B"> 
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4">
                    <ul class="list-unstyled">
                        <li>
                            <h5 class="font-weight-bold"><a target="_blank" class="text-white"> COMPUTACION EN LA NUBE </a><?php echo date('Y'); ?></h5>
                        </li>
                        
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <ul class="list-unstyled">
                        <li>
                            <h5 class="font-weight-bold">Apurímac</h5>
                        </li>
                        <li><i class="fas fa-map-marker-alt"></i> Abancay </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <ul class="list-unstyled">
                        <li>
                            <h5 class="font-weight-bold">Siguenos en:</h5>
                        </li>
                        <li>Facebook</li>
                        </li>

                        <li>
                            <a href="#" class="footer-link text-white" target="_blank">
                            Youtube
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- MDBootstrap V5 -->
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('js/clientjs/mdb.min.js') }}"></script>
    <!-- General scripts -->
    <script src="{{ asset('js/clientjs/main.js') }}"></script>
    <script>
        $.ajax({
            url: "{{ route('contador') }}",
            method: 'GET',
            data: {},
            dataType: 'json',
            success: function(data) {
                if (data.cont_carrito > 0) {
                    $('#contador').removeClass('invisible');
                    $('#contador').show();
                    if (data.cont_carrito < 10) {
                        $('#contador').text(data.cont_carrito);
                    } else {
                        $('#contador').text('9+');
                    }
                } else {
                    $('#contador').hide();
                }
            }
        });
    </script>
</body>

</html>























{{-- <!doctype html>
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
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel test') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto"> 
                         
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
</body>
</html> --}}
