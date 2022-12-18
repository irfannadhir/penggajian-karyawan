<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template">
    <meta name="author" content="Codedthemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    @stack('css_resource')
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg d-none">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
                <a href="index.html" class="b-brand">
                    <div class="b-bg">
                        <i class="feather icon-trending-up"></i>
                    </div>
                    <span class="b-title">BCI</span>
                </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigation</label>
                    </li>
                    <li data-username="landing page" class="nav-item"><a href="{{ url('dashboard') }}"
                            class="nav-link"><span class="pcoded-micon"><i
                                    class="feather icon-navigation-2"></i></span><span
                                class="pcoded-mtext">Dashboard</span></a></li>
                    @if (in_array(auth()->user()->role, ['admin produksi', 'admin payroll']))
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark"
                            class="nav-item pcoded-hasmenu {{ in_array(Request::segment(1), ['user', 'produk', 'kategori-produk']) ? 'active pcoded-trigger' : '' }}">
                            <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-layout"></i></span><span class="pcoded-mtext">Master
                                    Data</span></a>
                            <ul class="pcoded-submenu">
                                @if (in_array(auth()->user()->role, ['admin payroll']))
                                    <li class="{{ Request::segment(1) == 'user' ? 'active' : '' }}">
                                        <a href="{{ route('user.index') }}" class="">User</a>
                                    </li>
                                @endif
                                <li class="{{ Request::segment(1) == 'kategori-produk' ? 'active' : '' }}">
                                    <a href="{{ route('kategori-produk.index') }}" class="">Kategori
                                        Produk</a>
                                </li>
                                <li class="{{ Request::segment(1) == 'produk' ? 'active' : '' }}">
                                    <a href="{{ route('produk.index') }}" class="">Produk</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (in_array(auth()->user()->role, ['karyawan borongan', 'admin payroll']))
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark"
                            class="nav-item pcoded-hasmenu {{ in_array(Request::segment(1), ['payroll', 'print-slip']) ? 'active pcoded-trigger' : '' }}">
                            <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-layout"></i></span><span
                                    class="pcoded-mtext">Transaksi</span></a>
                            <ul class="pcoded-submenu">
                                {{-- @if (in_array(auth()->user()->role, ['admin payroll'])) --}}
                                <li class="{{ Request::segment(1) == 'payroll' ? 'active' : '' }}">
                                    <a href="{{ route('payroll.index') }}" class="">Payroll</a>
                                </li>
                                {{-- @endif --}}
                                <li class="{{ Request::segment(1) == 'print-slip' ? 'active' : '' }}">
                                    <a href="{{ url('print-slip') }}" class="">Print Slip</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    @if (in_array(auth()->user()->role, ['keuangan', 'admin payroll']))
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark"
                            class="nav-item pcoded-hasmenu {{ in_array(Request::segment(1), ['laporan']) ? 'active pcoded-trigger' : '' }}">
                            <a href="#!" class="nav-link"><span class="pcoded-micon"><i
                                        class="feather icon-layout"></i></span><span class="pcoded-mtext">Laporan
                                </span></a>
                            <ul class="pcoded-submenu">
                                <li class="{{ Request::segment(1) == 'laporan-transaksi' ? 'active' : '' }}">
                                    <a href="/laporan-transaksi" class="">Laporan Transaksi</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">
                <div class="b-bg">
                    <i class="feather icon-trending-up"></i>
                </div>
                <span class="b-title">BCI</span>
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i
                            class="feather icon-maximize"></i></a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>{{ auth()->user()->name }}</span>
                                <a href="javascript:void(0);" id="btn_logout" class="dud-logout" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                            </div>
                            <ul class="pro-body">
                                <li><a href="#!" class="dropdown-item"><i class="feather icon-settings"></i>
                                        Settings</a></li>
                                <li><a href="#!" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->

    <!-- Required Js -->
    <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/pcoded.min.js') }}"></script>

    @stack('js_resource')

    <script>
        $('#btn_logout').on('click', function() {
            fetch('{{ route('logout') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(res => window.location.replace('{{ route('login') }}'))
                .catch(res => console.error(res))
        })
    </script>
    @include('sweetalert::alert')
</body>

</html>
