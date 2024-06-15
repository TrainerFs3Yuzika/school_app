@extends('layouts.master')

@section('content')
<title>Daftar Ekstrakurikuler</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Ekstrakurikuler</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Ekstrakurikuler</li>
                            <li class="breadcrumb-item active">Semua Ekstrakurikuler</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="book-group-form py-3">
            <div class="row">
                <!-- Search form -->
                <div class="col-md-4">
                    <form action="{{ route('eskuls.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Ekstrakurikuler..." value="{{ request()->get('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Ekstrakurikuler</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('eskuls.create') }}" class="btn btn-primary">Tambah
                                        Ekstrakurikuler <i class="fas fa-plus"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable" id="eskulsTable">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Eskul</th>
                                        <th>Pembina</th>
                                        <th>Waktu Eskul</th>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <th>Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eskuls as $key => $eskul)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $eskul->nama_eskul }}</td>
                                        <td>{{ $eskul->pembina }}</td>
                                        <td>{{ $eskul->waktu_eskul }}</td>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <td class="text-center align-middle">
                                            <div class="actions d-flex justify-content-center align-items-center">
                                                <!-- Tombol untuk menampilkan detail -->
                                                <a href="{{ route('eskuls.show', $eskul->id) }}" class="btn btn-sm me-2">
                                                    <i class="far fa-eye me-1"></i>
                                                </a>
                                                
                                                <!-- Tombol untuk mengedit -->
                                                <a href="{{ route('eskuls.edit', $eskul->id) }}" class="btn btn-sm me-2">
                                                    <i class="far fa-edit me-1"></i>
                                                </a>
                                                
                                                <!-- Form untuk menghapus dengan konfirmasi -->
                                                <form action="{{ route('eskuls.destroy', $eskul->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus eskul ini?')">
                                                        <i class="far fa-trash-alt me-1"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        @endif
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
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
$(document).ready(function() {
    $('#eskulsTable').DataTable({
        "pageLength": 5, // Menampilkan lima data per halaman
        "searching": false // Menonaktifkan fungsi pencarian datatable karena sudah ada form pencarian sendiri
});

var successMessage = '{{ Session::get('success') }}';
var errorMessage = '{{ Session::get('error') }}';

if (successMessage) {
    toastr.success(successMessage, 'Sukses');
}
if (errorMessage) {
    toastr.error(errorMessage, 'Error');
}
});
</script>
@endsection
