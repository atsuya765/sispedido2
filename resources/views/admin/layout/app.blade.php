<!DOCTYPE html>
<html dir="ltr" lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Restaurante- @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="robots" content="noindex,nofollow">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('plugins/images/favicon.ico') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bower_components/chartist/dist/chartist.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- datatables stios -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>

<body>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6" style="background-color: #293462;"
                >
                    <a class="navbar-brand" href="#">
                        <b class="logo-icon">
                            <img src="{{ asset('plugins/images/rest.png') }}" width="50px" alt="homepage"
                                style="border-radius:5px">
                        </b>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li class=" in">
                            <form role="search" class="app-search d-none d-md-block me-3">
                                <input type="text" placeholder="Search..." class="form-control mt-0">
                                <a href="" class="active">
                                    <i class="fa fa-search"></i>
                                </a>
                            </form>
                        </li>
                        <li>
                            <a class="profile-pic" is-modal="true" href="#" data-bs-toggle="modal"
                                data-bs-target="#modalGenerico"><img src="{{ asset('plugins/images/rest.png') }}"
                                    width="40" height="40" class="img-circle"></a>
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
                                <span class="text-white font-medium">{{ Auth::user()->name }}
                                </span> &nbsp; <i class="fa fa-sign-out" aria-hidden="true"></i>
                                &nbsp;&nbsp;<span></span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" style="background-color: #293462; font-size: 20px"
        >
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('home') }}"
                                aria-expanded="false">
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <span class="hide-menu">Panel de Control</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('usuarios.index') }}" aria-expanded="false">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <span class="hide-menu">Usuarios</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('platoss.index') }}" aria-expanded="false">
                                <i class="fa fa-cutlery" aria-hidden="true"></i>
                                <span class="hide-menu">Platos</span>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ route('orden.pedidos') }}" aria-expanded="false">
                                <i class="fa fa-bell" aria-hidden="true"></i>
                                <span class="hide-menu">Pedidos</span>
                                <div id="notificador" class="notify invisible">
                                    <span class="heartbit"></span>
                                    <span id="contador"
                                        style="position: absolute;top:-18px;left:-7px; z-index:100;">0</span>
                                    <span class="point"></span>
                                </div>
                            </a>
                        </li>
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="{{ url('/calificaciones') }}" aria-expanded="false">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <span class="hide-menu">Calificación</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper">
            @yield('content')
        </div>
        <footer class="footer text-center"> © <?php echo date('Y'); ?> <a
                target="_blank"> Sistema de pedidos Delivery</a>
        </footer>
    </div>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('plugins/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('js/waves.js') }}"></script>
    <script src="{{ asset('js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/chartist/dist/chartist.min.js') }}"></script>
    <script src="{{ asset('plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}">
    </script>
    <script src="{{ asset('js/pages/dashboards/dashboard1.js') }}"></script>
    <script src="{{ asset('js/jquery.plugin.min.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- datatable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                select: true,
                "pageLength": 5,
                lengthMenu: [
                    [5, 10, 20, -1],
                    [5, 10, 20, 'Todos']
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                }
            });
        });
    </script>
    <script>
        $(function() {
            contador();

            function contador() {
                $.ajax({
                    url: "{{ route('contadororden') }}",
                    method: 'GET',
                    data: {},
                    dataType: 'json',
                    success: function(data) {
                        if (data.cont_orden > 0) {
                            $('#contador').show();
                            $('#notificador').show();
                            $('#notificador').removeClass('invisible');
                            if (data.cont_orden < 10) {
                                $('#contador').text(data.cont_orden);
                            } else {
                                $('#contador').text('9+');
                            }
                        } else {
                            $('#notificador').hide();
                            $('#contador').hide();
                        }
                    }
                });
            }
            setInterval(function() {
                contador();
            }, 3000);
        });
    </script>
    <!-- findetable -->
</body>

</html>
