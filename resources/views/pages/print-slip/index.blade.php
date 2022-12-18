@extends('layouts.app')

@section('title', 'Print Slip Gaji')

@section('content')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Print Slip Gaji</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#!">Print Slip Gaji</a></li>
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
                                <h5>Print Slip Gaji</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form action="/print-slip" method="POST">
                                            @csrf
                                            @if (auth()->user()->role !== 'karyawan borongan')
                                                <div class="form-group">
                                                    <label for="karyawan_id">Nama Karyawan Borongan</label>
                                                    <select name="karyawan_id" id="karyawan_id" class="form-control">
                                                        @foreach ($karyawans as $karyawan)
                                                            <option value="{{ $karyawan->id }}">{{ $karyawan->name }} ||
                                                                {{ $karyawan->nik }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            @else
                                                <input type="hidden" name="karyawan_id" value="{{ auth()->user()->id }}">
                                            @endif
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="tanggal_awal">Tanggal Awal</label>
                                                    <input type="date" class="form-control" name="tanggal_awal"
                                                        id="tanggal_awal" value="{{ date('Y-m-d') }}">
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="tanggal_akhir">Tanggal Akhir</label>
                                                    <input type="date" class="form-control" name="tanggal_akhir"
                                                        id="tanggal_akhir" value="{{ date('Y-m-d') }}">
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
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
