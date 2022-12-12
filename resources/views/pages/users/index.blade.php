@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Users</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#!">Users</a></li>
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
                                <h5>Data User</h5>
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
                                                <th>Nama Karyawan</th>
                                                <th>Tanggal Masuk Kerja</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Alamat</th>
                                                <th>No HP</th>
                                                <th>Foto</th>
                                                <th>Role</th>
                                                <th>Admin</th>
                                                <th>NIK</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->tgl_masuk_kerja }}</td>
                                                    <td>{{ $user->jenis_kelamin == 'P' ? 'Perempuan' : 'Laki-laki' }}</td>
                                                    <td>{{ $user->tempat_lahir }}</td>
                                                    <td>{{ $user->tanggal_lahir }}</td>
                                                    <td>{{ $user->alamat }}</td>
                                                    <td>{{ $user->no_hp }}</td>
                                                    <td>
                                                        @if ($user->foto)
                                                            <img src="{{ asset('storage/' . $user->foto) }}" alt="foto"
                                                                style="width: 100%;">
                                                        @endif
                                                    </td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->nik }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modalEdit{{ $user->id }}">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#modalDelete{{ $user->id }}">
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

    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="from-group">
                            <label for="name">Nama Karyawan</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="tgl_masuk_kerja">Tanggal Masuk Kerja</label>
                            <input type="date" class="form-control" name="tgl_masuk_kerja"
                                value="{{ old('tgl_masuk_kerja') }}">
                            @error('tgl_masuk_kerja')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="P">Perempuan</option>
                                <option value="L">Laki-laki</option>
                            </select>
                            @error('jenis_kelamin')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                            @error('alamat')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="no_hp">No Hp</label>
                            <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}">
                            @error('no_hp')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto">
                            @error('foto')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="role">Role</label>
                            <select class="form-control" name="role" id="role">
                                <option value="admin payroll">Admin Payroll</option>
                                <option value="karyawan borongan">Karyawan Borongan</option>
                                <option value="admin produksi">Admin Produksi</option>
                                <option value="keuangan">Keuangan</option>
                            </select>
                            @error('role')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" name="nik" value="{{ old('nik') }}">
                            @error('nik')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="from-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @error('password')
                                {{ $message }}
                            @enderror
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

    @foreach ($users as $user)
        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            <div id="modalEdit{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog"
                aria-labelledby="modalEditTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalEditTitle">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="from-group">
                                <label for="name">Nama Karyawan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ $user->name }}">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="tgl_masuk_kerja">Tanggal Masuk Kerja</label>
                                <input type="date" class="form-control @error('tgl_masuk_kerja') is-invalid @enderror"
                                    name="tgl_masuk_kerja" value="{{ $user->tgl_masuk_kerja }}">
                                @error('tgl_masuk_kerja')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                    name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan
                                    </option>
                                    <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki
                                    </option>
                                </select>
                                @error('jenis_kelamin')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    name="tempat_lahir" value="{{ $user->tempat_lahir }}">
                                @error('tempat_lahir')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="tanggal_lahir">Nama</label>
                                <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                    name="tanggal_lahir" value="{{ $user->tanggal_lahir }}">
                                @error('tanggal_lahir')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat" value="{{ $user->alamat }}">
                                @error('alamat')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                    name="no_hp" value="{{ $user->no_hp }}">
                                @error('no_hp')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="foto">Foto</label>
                                <input type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto">
                                @error('foto')
                                    {{ $message }}
                                @enderror
                            </div>
                            <input type="hidden" name="old" value="{{ $user->foto }}">
                            <div class="from-group">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role">
                                    <option value="admin payroll" {{ $user->role == 'admin payroll' ? 'selected' : '' }}>
                                        Admin
                                        Payroll</option>
                                    <option value="karyawan borongan"
                                        {{ $user->role == 'karyawan borongan' ? 'selected' : '' }}>
                                        Karyawan Borongan
                                    </option>
                                    <option value="admin produksi"
                                        {{ $user->role == 'admin produksi' ? 'selected' : '' }}>Admin
                                        Produksi
                                    </option>
                                    <option value="keuangan" {{ $user->role == 'keuangan' ? 'selected' : '' }}>Keuangan
                                    </option>
                                </select>
                                @error('role')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ $user->email }}">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                    name="nik" value="{{ $user->nik }}">
                                @error('nik')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="from-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
            <div id="modalDelete{{ $user->id }}" class="modal fade" tabindex="-1" role="dialog"
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
