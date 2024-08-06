<!-- resources/views/books/create_book.blade.php -->
@extends('layouts.master')
@section('content')
<title>Tambah Buku</title>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Buku</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Buku</a></li>
                            <li class="breadcrumb-item active">Tambah Buku</li>
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
                        <form action="{{ route('books.store') }}" method="POST" class="row" enctype="multipart/form-data" onsubmit="return confirmAdd()">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label for="judul">Judul Buku <span class="login-danger">*</span></label>
                                    <input type="text" name="judul" class="form-control" placeholder="Masukkan Judul Buku" required>
                                </div>
                                <div class="form-group local-forms">
                                    <label for="penulis">Penulis Buku <span class="login-danger">*</span></label>
                                    <input type="text" name="penulis" class="form-control" placeholder="Masukkan Penulis Buku" required>
                                </div>
                                <div class="form-group local-forms">
                                    <label for="penerbit">Penerbit Buku <span class="login-danger">*</span></label>
                                    <input type="text" name="penerbit" class="form-control" placeholder="Masukkan Penerbit Buku" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group local-forms">
                                    <label for="tahun_terbit">Tahun Terbit Buku <span class="login-danger">*</span></label>
                                    <input type="number" name="tahun_terbit" class="form-control" placeholder="Masukkan Tahun Terbit Buku" required>
                                </div>
                                <div class="form-group local-forms">
                                    <label for="genre">Genre Buku <span class="login-danger">*</span></label>
                                    <select name="genre" class="form-control" required>
                                        <option value="fiksi">Fiksi</option>
                                        <option value="non-fiksi">Non-Fiksi</option>
                                        <option value="pelajaran">Pelajaran</option>
                                    </select>
                                </div>
                                <div class="form-group local-forms">
                                    <label for="stok">Stok Buku <span class="login-danger">*</span></label>
                                    <input type="number" name="stok" class="form-control" placeholder="Masukkan Stok Buku" required>
                                </div>
                                <div class="form-group local-forms">
                                    <label for="gambar">Gambar Buku</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning ms-2">Reset</button>
                            </div>
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
                text: 'Apakah Anda yakin ingin mengunggah tugas ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Unggah',
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
