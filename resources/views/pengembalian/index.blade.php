@extends('layouts.master')

@section('content')
    <title>Daftar Pengembalian</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Daftar Pengembalian Buku</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Pengembalian</li>
                                <li class="breadcrumb-item active">Daftar Pengembalian</li>
                            </ul>
                        </div>
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
                                        <h3 class="page-title">Daftar Pengembalian Buku</h3>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulir untuk Menambahkan Pengembalian -->
                            <form action="{{ route('pengembalian.create') }}" method="GET" class="mb-3">
                                @csrf
                                <div class="form-group">
                                    <label for="peminjaman_id">Pilih Peminjaman:</label>
                                    <select name="peminjaman_id" id="peminjaman_id" class="form-control" required>
                                        <option value="">Pilih Peminjaman</option>
                                        @foreach($peminjamans as $peminjaman)
                                        <option value="{{ $peminjaman->id }}">
                                            {{ $peminjaman->user->name }} (ID: {{ $peminjaman->id }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Pengembalian</button>
                            </form>

                            <div class="table-responsive">
                                <table id="pengembalianTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Peminjam</th>
                                            <th scope="col">Tanggal Pengembalian</th>
                                            <th scope="col">Denda</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengembalians as $key => $pengembalian)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $pengembalian->peminjaman->user->name ?? '-' }}</td>
                                            <td>{{ $pengembalian->tanggal_pengembalian ? \Carbon\Carbon::parse($pengembalian->tanggal_pengembalian)->format('d/m/Y') : '-' }}</td>
                                            <td>{{ $pengembalian->denda ?? '-' }}</td>
                                            <td>
                                                @if(is_null($pengembalian->tanggal_pengembalian))
                                                <a href="{{ route('pengembalian.create', ['peminjaman_id' => $pengembalian->peminjaman_id]) }}" class="btn btn-primary">Kembalikan Buku</a>
                                                @else
                                                <span class="badge bg-success">Sudah Dikembalikan</span>
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
            $('#pengembalianTable').DataTable({
                "pageLength": 5,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ data per halaman",
                    "zeroRecords": "Tidak ada data yang ditemukan",
                    "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang tersedia",
                    "infoFiltered": "(difilter dari total _MAX_ data)",
                    "paginate": {
                        "first": "Pertama",
                        "last": "Terakhir",
                        "next": "Selanjutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });

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
