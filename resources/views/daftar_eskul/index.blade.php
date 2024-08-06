@extends('layouts.master')

@section('content')
<title>Daftar Eskul</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Eskul</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Eskul</li>
                            <li class="breadcrumb-item active">Semua Eskul</li>
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
                                    <h3 class="page-title">Daftar Eskul</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('daftar-eskul.create') }}" class="btn btn-primary">Pendaftaran Eskul <i class="fas fa-plus"></i></a>
                                    <a href="{{ route('daftar-eskul.rekap') }}" class="btn btn-secondary">Rekap Eskul</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="eskulTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Eskul</th>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarEskuls as $key => $daftar)
                                    <tr>
                                        <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                        <td>{{ $daftar->eskul->nama_eskul }}</td> <!-- Nama Eskul -->
                                        <td>{{ $daftar->user->name }}</td> <!-- Nama Siswa -->
                                        <td>
                                            <div class="actions">
                                                <a href="{{ route('daftar-eskul.show', $daftar->id) }}" class="btn btn-sm bg-info-light">
                                                    <i class="far fa-eye"></i>
                                                </a>
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

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Initialize DataTable -->
<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#eskulTable').DataTable();

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
