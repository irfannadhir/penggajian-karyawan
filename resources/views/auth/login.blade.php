<!DOCTYPE html>
<html lang="en">

<head>
    <title>Halaman Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        .auth-bg-custom {
            background-image: url('{{ asset('foto/WhatsApp Image 2022-12-09 at 21.25.41.jpeg') }}');
            background-size: 100% 100%;
            background-attachment: fixed;
            background-position: left;
            background-repeat: no-repeat;
        }
    </style>

</head>

<body>
    <div class="auth-wrapper aut-bg-img-side cotainer-fiuid align-items-stretch">
        <div class="row align-items-center w-100 align-items-stretch bg-white">
            <div class="d-none d-lg-flex col-lg-8 auth-bg-custom d-flex justify-content-center">
                <div class="col-md-8">
                    <h1 class="text-dark my-5"><u>PT. Batavia Cyclindo Industri</u></h1>
                </div>
            </div>
            <div class="col-lg-4 align-items-stret h-100 align-items-center d-flex justify-content-center">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class=" auth-content text-center">
                        <p class="text-dark">Sistem Informasi Penggajian Karyawan Borongan
                            Berdasarkan Hasil Produksi Pada Bagian Cushion PT. Batavia
                            Cyclindo Industri</p>
                        <div class="mb-4">
                            <i class="feather icon-unlock auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Login</h3>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control" placeholder="password" name="password">
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    {{-- <script src="{{ asset('assets/js/vendor-all.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/js/pcoded.min.js') }}"></script> --}}

</body>

</html>
