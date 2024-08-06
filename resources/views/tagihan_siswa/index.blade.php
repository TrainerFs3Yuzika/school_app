@extends('layouts.master')

@section('content')
<title>Daftar Tagihan</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Tagihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Tagihan</li>
                            <li class="breadcrumb-item active">Semua Tagihan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Tagihan</h3>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="billTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Jenis Tagihan</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tagihans as $tagihan)
                                    <tr>
                                        <td>{{ $tagihan->user->name }}</td> <!-- Menampilkan nama siswa -->
                                        <td>{{ $tagihan->payment_type }}</td>
                                        <td>{{ number_format($tagihan->amount, 2, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('tagihan_siswa.show', $tagihan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            @if (auth()->user()->role_name === 'Admin')
                                                <a href="{{ route('tagihan_siswa.edit', $tagihan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                <form action="{{ route('tagihan_siswa.destroy', $tagihan->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')">Hapus</button>
                                                </form>
                                            @endif
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

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Initialize DataTable -->
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#billTable').DataTable();

    // Toastr notifications
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
