@extends('layouts.master')
@section('content')
<title>Daftar Buku</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: purple;">Buku</li>
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
                <div class="col-md-6">
                    <form action="{{ route('books.index') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul atau genre" value="{{ request()->query('search') }}">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<br>        
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="container mt-5">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center  p-4">
                                            <h1 class="display-4">
                                                Bagi Yang Telat Pengembalian di Denda  <br>
                                                <span style="color: purple;">Per-Hari Rp. 1000</span>
                                            </h1>
                                            <h1 style="display: inline-block; border-bottom: 3px solid purple; padding-bottom: 10px;">list Buku</h1>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (auth()->user()->role_name === 'Staff_perpus')
                                        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku <i class="fas fa-plus"></i></a>
                                        <a href="/export-pdf" class="btn btn-primary">Export PDF <i class="fas fa-file-pdf"></i></a>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            @foreach ($books as $key => $book)
                            <div class="col">
                                <div class="card h-100 shadow">
                                    <div style="position: relative;">
                                        @if ($book->gambar)
                                        <img src="{{ asset('storage/' . $book->gambar) }}" class="card-img-top" alt="Gambar Buku">
                                        @else
                                        <div class="d-flex align-items-center justify-content-center" style="height: 200px; background-color: #f1f1f1;">
                                            <span class="text-muted">Tidak ada gambar</span>
                                        </div>
                                        @endif
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <div class="position-absolute top-0 end-0 p-2">
                                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-danger">
                                                <i class="far fa-edit"></i>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $book->judul }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $book->penulis }}</h6>
                                        <p class="card-text">{{ $book->penerbit }}</p>
                                        <p class="card-text">Tahun Terbit: {{ $book->tahun_terbit }}</p>
                                        <p class="card-text">
                                            Genre:
                                            @foreach (explode(',', $book->genre) as $genre)
                                            <span class="badge bg-primary">{{ trim($genre) }}</span>
                                            @endforeach
                                        </p>
                                        <p class="card-text">Stok: {{ $book->stok }}</p>
                                    </div>
                                    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="{{ route('peminjaman.create', ['book_id' => $book->id]) }}" class="btn btn-sm btn-outline-primary me-2">
                                                <i class="fas fa-info-circle me-1"></i> Pinjam
                                            </a>
                                            
                                            @if (auth()->user()->role_name === 'Staff_perpus')
    <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
            <i class="far fa-trash-alt me-1"></i> Hapus
        </button>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-primary">
            <i class="far fa-edit me-1"></i> Edit
        </a>
    </form>
@endif

                                        </div>
                                        <small class="text-muted">No {{ ++$key }}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
