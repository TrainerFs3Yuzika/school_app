@extends('layouts.master')

@section('content')
    <title>Daftar Peminjaman</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Daftar Peminjaman Buku</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Peminjaman</li>
                                <li class="breadcrumb-item active">Daftar Peminjaman</li>
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
                                        <h3 class="page-title">Daftar Peminjaman Buku</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">

                                        @if (auth()->user()->role_name === 'Super Admin')
                                            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary"><i
                                                    class="fas fa-plus"></i> Tambah Peminjaman</a>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="peminjamanTable"
                                    class="table border-0 star-book table-hover table-center mb-0  table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            {{-- <th scope="col">ID</th> --}}
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Nama Peminjam</th>
                                            <th scope="col">Tanggal Pinjam</th>
                                            <th scope="col">Tanggal Kembali</th>
                                            <th scope="col">Jumlah Buku</th>
                                            <th scope="col">Status</th>
                                            @if (auth()->user()->role_name === 'Super Admin')
                                                <th scope="col">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
<!-- resources/views/peminjaman/index.blade.php -->
<tbody>
    @foreach ($peminjamans as $key => $peminjaman)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $peminjaman->book->judul }}</td>
            <td>{{ $peminjaman->user ? $peminjaman->user->name : 'Unknown' }}</td> <!-- Menampilkan nama peminjam -->
            <td>{{ $peminjaman->tanggal_pinjam }}</td>
            <td>{{ $peminjaman->tanggal_kembali }}</td>
            <td>{{ $peminjaman->jumlah_buku }}</td>
            <td>{{ $peminjaman->status }}</td>
            @if (auth()->user()->role_name === 'Super Admin')
                <td>
                    <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-light rounded"><i class="far fa-edit"></i></a>
                    <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-light rounded" onclick="return confirm('Apakah Anda yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></button>
                    </form>
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

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    <!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Initialize DataTable -->
    <script>
        $(document).ready(function() {
            // Initialize DataTable with pagination and search functionality
            $('#peminjamanTable').DataTable({
                "pageLength": 5, // Set number of rows per page
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
    
            console.log("Success Message: ", successMessage); // Debugging
            console.log("Error Message: ", errorMessage); // Debugging
    
            if (successMessage) {
                toastr.success(successMessage, 'Sukses');
            }
            if (errorMessage) {
                toastr.error(errorMessage, 'Error');
            }
        });
    </script>
    
@endsection
