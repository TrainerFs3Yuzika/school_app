@extends('layouts.master')

@section('content')
<title>Rekap Pendaftaran Eskul</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Rekap Pendaftaran Eskul</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Eskul</li>
                            <li class="breadcrumb-item active">Rekap Pendaftaran Eskul</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="rekapEskulTable" class="table border-0 table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Nama Eskul</th>
                                        <th scope="col">Nama Siswa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($daftarEskuls as $daftar)
                                    <tr>
                                        <td>{{ $daftar->eskul->nama_eskul }}</td>
                                        <td>{{ $daftar->user->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Optional: Add a button to go back to the previous page -->
                        <a href="{{ route('daftar-eskul.index') }}" class="btn btn-secondary mt-3">Kembali</a>
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
    $('#rekapEskulTable').DataTable();
});
</script>
@endsection
