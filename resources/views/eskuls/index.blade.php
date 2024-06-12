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
        <div class="book-group-form">
            <div class="row">
                <!-- Search form -->
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eskuls as $key => $eskul)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $eskul->nama_eskul }}</td>
                                        <td>{{ $eskul->pembina }}</td>
                                        <td>{{ $eskul->waktu_eskul }}</td>
                                        <td>
                                            <a href="{{ route('eskuls.show', $eskul->id) }}"
                                                class="btn btn-info">Detail</a>
                                            <a href="{{ route('eskuls.edit', $eskul->id) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form action="{{ route('eskuls.destroy', $eskul->id) }}" method="POST"
                                                style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus eskul ini?')">Hapus</button>
                                            </form>
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
@endsection


@section('scripts')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#eskulsTable').DataTable({
        "pageLength": 5, // Menampilkan hanya lima data per halaman
        "searching": true // Mengaktifkan fungsi pencarian
    });
});
</script>

@endsection
