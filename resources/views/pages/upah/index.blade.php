@extends('layouts.app')

@section('title', 'Besaran Upah')

@section('content')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Besaran Upah</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#!">Besaran Upah</a></li>
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
                                <h5>Data Besaran Upah</h5>
                            </div>
                            <div class="card-block">
                                <button type="button" class="btn btn-primary d-flex ml-auto" data-toggle="modal"
                                    data-target="#modalAdd">Tambah Data</button>
                                <div class="table-responsive">
                                    <table id="key-act-button" class="display table nowrap table-striped table-hover"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Produk</th>
                                                <th>Besaran Upah</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($besaran_upahs as $besaran_upah)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $besaran_upah->produk ?? $besaran_upah->nama_produk }}</td>
                                                    <td>{{ $besaran_upah->besaran_upah }}</td>
                                                    <td>{{ $besaran_upah->keterangan }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modalEdit{{ $besaran_upah->id }}">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modalDelete{{ $besaran_upah->id }}">
                                                                Hapus
                                                            </button>
                                                        </div>
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

    <form action="{{ route('user.store') }}" method="POST">
        <div id="modalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalAddTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddTitle">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @foreach ($besaran_upahs as $besaran_upah)
        <form action="{{ route('user.update', $besaran_upah->id) }}" method="POST">
            <div id="modalEdit{{ $besaran_upah->id }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="modalEditTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditTitle">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ $besaran_upah->name }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('user.destroy', $besaran_upah->id) }}" method="POST">
            <div id="modalDelete{{ $besaran_upah->id }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="modalDeleteTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    @csrf
                    @method('DELETE')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDeleteTitle">Hapus Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah anda yakin ingin hapus data ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
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
