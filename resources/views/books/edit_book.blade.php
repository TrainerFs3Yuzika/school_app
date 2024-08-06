<!-- resources/views/books/edit_book.blade.php -->
<!-- resources/views/books/create_book.blade.php -->
@extends('layouts.master')
@section('content')
<title>Edit Buku</title>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Buku</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Buku</a></li>
                            <li class="breadcrumb-item active">Edit Buku</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <h5 class="form-title student-info">Informasi Buku
                            <span>
                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                            </span>
                        </h5>
                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Apakah Anda yakin ingin mengubah buku ini?')">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="judul">Judul <span class="login-danger">*</span></label>
                                        <input type="text" name="judul" class="form-control" value="{{ $book->judul }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="penulis">Penulis <span class="login-danger">*</span></label>
                                        <input type="text" name="penulis" class="form-control" value="{{ $book->penulis }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="penerbit">Penerbit <span class="login-danger">*</span></label>
                                        <input type="text" name="penerbit" class="form-control" value="{{ $book->penerbit }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="tahun_terbit">Tahun Terbit <span class="login-danger">*</span></label>
                                        <input type="number" name="tahun_terbit" class="form-control" value="{{ $book->tahun_terbit }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="genre">Genre <span class="login-danger">*</span></label>
                                        <select name="genre" class="form-control" required>
                                            <option value="fiksi" {{ $book->genre == 'fiksi' ? 'selected' : '' }}>Fiksi</option>
                                            <option value="non-fiksi" {{ $book->genre == 'non-fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                                            <option value="pelajaran" {{ $book->genre == 'pelajaran' ? 'selected' : '' }}>Pelajaran</option>
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="stok">Stok <span class="login-danger">*</span></label>
                                        <input type="number" name="stok" class="form-control" value="{{ $book->stok }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="gambar">Gambar Buku</label>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                    @if ($book->gambar)
                                        <div class="form-group">
                                            <p>Gambar saat ini:</p>
                                            <img src="{{ asset('storage/' . $book->gambar) }}" alt="Gambar Buku" style="max-width: 200px;">
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-warning ms-2">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengubah buku ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
