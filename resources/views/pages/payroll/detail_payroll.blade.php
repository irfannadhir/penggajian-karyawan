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
                            <li class="breadcrumb-item"><a href="{{ route('payroll.index') }}">Data Payroll</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Payroll</a></li>
                            <li class="breadcrumb-item"><a href="#!">Detail Payroll Perkaryawan</a></li>
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
                            <div class="card-block">
                                <p>Nama Karyawan : {{ $payroll->karyawan->name }}</p>
                                <p>Tanggal Produksi : {{ $payroll->tanggal_produksi }}</p>
                                <p>Total : Rp. {{ number_format($payroll->total) }}</p>
                                <div class="table-responsive">
                                    <table id="key-act-button" class="display table nowrap table-striped table-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th>Qty Produks</th>
                                                <th>Upah perproduk</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payroll->detail as $detail)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $detail->produk->nama_produk ?? '' }}</td>
                                                    <td>{{ $detail->qty }}</td>
                                                    <td>Rp. {{ number_format($detail->produk->upah_per_produk) ?? '' }}</td>
                                                    <td>Rp.
                                                        {{ number_format($detail->produk->upah_per_produk * $detail->qty) ?? '' }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
    <!-- data tables css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/data-tables/css/datatables.min.css') }}">
@endpush

@push('js_resource')
    <!-- datatable Js -->
    <script src="{{ asset('assets/plugins/data-tables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tbl-datatable-custom.js') }}"></script>
@endpush
