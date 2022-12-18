@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <div class="main-body">
        <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row justify-content-center mt-5">
                <div class="col-md-12">
                    <h1 class="text-center">PT. Batavia Cyclindo Industri</h1>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>
@endsection

@push('js_resource')
    <!-- amchart js -->
    <script src="{{ asset('assets/plugins/amchart/js/amcharts.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/gauge.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/serial.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/light.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/pie.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/ammap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/usaLow.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/radar.js') }}"></script>
    <script src="{{ asset('assets/plugins/amchart/js/worldLow.js') }}"></script>

    <!-- dashboard-custom js -->
    <script src="{{ asset('assets/js/pages/dashboard-ecommerce.js') }}"></script>
@endpush
