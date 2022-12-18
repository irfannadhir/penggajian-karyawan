@extends('layouts.app')

@section('title', 'Produk')

@section('content')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#!">Produk</a></li>
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
                                <h5>Data produk</h5>
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
                                                <th>Nama produk</th>
                                                <th>Kategori produk</th>
                                                <th>Satuan</th>
                                                <th>Warna</th>
                                                <th>Berat produk</th>
                                                <th>Upah per produk</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($produks as $produk)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $produk->nama_produk }}</td>
                                                    <td>{{ $produk->kategori->nama_kategori ?? '' }}
                                                    </td>
                                                    <td>{{ $produk->satuan }}</td>
                                                    <td>

                                                        <div
                                                            style="padding: 8px; border: 1px solid green; background-color: {{ $produk->warna }};">
                                                        </div>
                                                        code: {{ $produk->warna }}
                                                    </td>
                                                    <td>{{ $produk->berat_produk }} {{ $produk->satuan_produk }}</td>
                                                    <td>Rp. {{ number_format($produk->upah_per_produk) }}</td>
                                                    <td>{{ $produk->keterangan }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modalEdit{{ $produk->id }}">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modalDelete{{ $produk->id }}">
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

    <form action="{{ route('produk.store') }}" method="POST">
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
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk">
                        </div>
                        <div class="form-group">
                            <label for="kategori_produk_id">Kategori Produk</label>
                            <select name="kategori_produk_id" id="kategori_produk_id" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <select name="satuan" id="satuan" class="form-control">
                                <option value="UNIT">UNIT</option>
                                <option value="SET">SET</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleColorInput" class="form-label">Warna</label>
                            <input type="text" id="text-field" class="form-control demo" name="warna" value="#70c24a">
                        </div>
                        <div class="form-group">
                            <label for="berat_produk">Berat Produk</label>
                            <div class="row">
                                <div class="col-8">
                                    <input type="number" class="form-control" name="berat_produk">
                                </div>
                                <div class="col-4">
                                    <select name="satuan_produk" id="satuan_produk" class="form-control">
                                        <option value="KG">KG</option>
                                        <option value="TON">TON</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="upah_per_produk">Upah perproduk (Rp)</label>
                            <input type="number" class="form-control" name="upah_per_produk">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="10" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @foreach ($produks as $produk)
        <form action="{{ route('produk.update', $produk->id) }}" method="POST">
            <div id="modalEdit{{ $produk->id }}" class="modal fade" tabindex="-1" role="dialog"
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
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk</label>
                                <input type="text" class="form-control" name="nama_produk"
                                    value="{{ $produk->nama_produk }}">
                            </div>
                            <div class="form-group">
                                <label for="kategori_produk_id">Kategori Produk</label>
                                <select name="kategori_produk_id" id="kategori_produk_id" class="form-control">
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $produk->satuan == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select name="satuan" id="satuan" class="form-control">
                                    <option value="UNIT" {{ $produk->satuan == 'UNIT' ? 'selected' : '' }}>UNIT</option>
                                    <option value="SET" {{ $produk->satuan == 'SET' ? 'selected' : '' }}>SET</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleColorInput" class="form-label">Warna</label>
                                <input type="text" id="text-field" class="form-control demo" name="warna"
                                    value="{{ $produk->warna }}">
                            </div>
                            <div class="form-group">
                                <label for="berat_produk">Berat Produk</label>
                                <div class="row">
                                    <div class="col-8">
                                        <input type="number" class="form-control" name="berat_produk"
                                            value="{{ $produk->berat_produk }}">
                                    </div>
                                    <div class="col-4">
                                        <select name="satuan_produk" id="satuan_produk" class="form-control">
                                            <option value="KG" {{ $produk->satuan_produk == 'KG' ? 'selected' : '' }}>
                                                KG</option>
                                            <option value="TON"
                                                {{ $produk->satuan_produk == 'TON' ? 'selected' : '' }}>TON</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="upah_per_produk">Upah perproduk (Rp)</label>
                                <input type="number" class="form-control" name="upah_per_produk"
                                    value="{{ $produk->upah_per_produk }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" cols="10" class="form-control" rows="5">{{ $produk->keterangan }}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST">
            <div id="modalDelete{{ $produk->id }}" class="modal fade" tabindex="-1" role="dialog"
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
    <!-- material datetimepicker css -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
    <!-- Bootstrap datetimepicker css -->
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/material/css/materialdesignicons.min.css') }}">
    <!-- minicolors css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/mini-color/css/jquery.minicolors.css') }}">
@endpush

@push('js_resource')
    <!-- material datetimepicker Js -->
    <script src="{{ asset('http://momentjs.com/downloads/moment-with-locales.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <!-- minicolors Js -->
    <script src="{{ asset('assets/plugins/mini-color/js/jquery.minicolors.min.js') }}"></script>

    <!-- form-picker-custom Js -->
    <script src="{{ asset('assets/js/pages/form-picker-custom.js') }}"></script>

    <script src="{{ asset('assets/plugins/data-tables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/tbl-datatable-custom.js') }}"></script>
@endpush
