@extends('layouts.app')

@section('title', 'Data Payroll')

@section('content')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Data Payroll</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Payroll</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main-body">
            <div class="page-wrapper">
                <!-- [ Main Content ] start -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h5>Data Payroll</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="{{ route('payroll.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="karyawan_id">Nama Karyawan Borongan</label>
                                                <select name="karyawan_id" id="karyawan_id" class="form-control">
                                                    @foreach ($karyawans as $karyawan)
                                                        <option value="{{ $karyawan->id }}">{{ $karyawan->name }} ||
                                                            {{ $karyawan->nik }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_produksi">Nama Karyawan Borongan</label>
                                                <input type="date" class="form-control" name="tanggal_produksi"
                                                    id="tanggal_produksi" value="{{ date('Y-m-d') }}">
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group mb-3 inputFormRow">
                                                    <select name="produk_id[]" class="form-control">
                                                        @foreach ($produks as $produk)
                                                            <option value="{{ $produk->id }}">{{ $produk->nama_produk }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="number" name="qty[]" class="form-control m-input"
                                                        required placeholder="Masukkan qty">
                                                    <div class="input-group-append">
                                                        <button id="removeRow" type="button"
                                                            class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                                <div id="newRow"></div>
                                                <button id="addRow" type="button" class="btn btn-secondary mb-3">Tambah
                                                    Produk</button>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css_resource')
    <!-- select2 css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <!-- multi-select css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/multi-select/css/multi-select.css') }}">
@endpush

@push('js_resource')
    <!-- select2 Js -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>

    <!-- multi-select Js -->
    <script src="{{ asset('assets/plugins/multi-select/js/jquery.quicksearch.js') }}"></script>
    <script src="{{ asset('assets/plugins/multi-select/js/jquery.multi-select.js') }}"></script>

    <!-- form-select-custom Js -->
    <script src="{{ asset('assets/js/pages/form-select-custom.js') }}"></script>
    <script src="{{ asset('assets/js/addrow.js') }}"></script>

    <script>
        AddRowController.init('{!! $produks !!}')
    </script>

    <script>
        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('.inputFormRow').remove();
        });
    </script>
@endpush
