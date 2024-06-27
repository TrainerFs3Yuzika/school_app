@extends('layouts.master')
@section('content')
<title>Daftar Buku</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Buku</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Buku</li>
                            <li class="breadcrumb-item active">Semua Buku</li>
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
                                    <h3 class="page-title">Daftar Buku</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku <i
                                            class="fas fa-plus"></i></a>
                                    @endif                                   
                                     @if (auth()->user()->role_name === 'Super Admin')
                                     <a href="/export-pdf" class="btn btn-primary">Export PDF <i class="fas fa-file-pdf"></i></a>

                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="table-responsive">
                                <table id="bookTable" class="table border-0 star-book table-hover table-center mb-0  table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            {{-- <th scope="col">ID</th> --}}
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col">Penerbit</th>
                                            <th scope="col">Tahun Terbit</th>
                                            <th scope="col">Genre</th>
                                            <th scope="col">Stok</th>
                                            @if (auth()->user()->role_name === 'Super Admin')
                                            <th scope="col">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($books as $key => $book)
                                            <tr>
                                                <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                                {{-- <td>{{ $book->id }}</td> <!-- ID --> --}}
                                                <td>{{ $book->judul }}</td> <!-- Judul -->
                                                <td>{{ $book->penulis }}</td> <!-- Penulis -->
                                                <td>{{ $book->penerbit }}</td> <!-- Penerbit -->
                                                <td>{{ $book->tahun_terbit }}</td> <!-- Tahun Terbit -->
                                                <td>{{ $book->genre }}</td> <!-- Genre -->
                                                <td>{{ $book->stok }}</td> <!-- Stok -->
                                                @if (auth()->user()->role_name === 'Super Admin')
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm bg-danger-light">
                                                            <i class="far fa-edit me-2"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                                <i class="far fa-trash-alt me-2"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td> <!-- Aksi -->
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

@section('script')
@section('script')
{{-- DataTables JS --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#bookTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ["5", "10", "25", "50", "All"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(disaring dari _MAX_ total entri)",
                "search": "Cari:",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
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

@endsection
