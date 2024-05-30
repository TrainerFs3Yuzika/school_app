<!-- resources/views/peminjaman/create.blade.php -->
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Tambah Peminjaman</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                                <li class="breadcrumb-item active">Tambah Peminjaman</li>
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
                            <form action="{{ route('peminjaman.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <h5 class="form-title student-info">Informasi Peminjaman
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="book_id">Judul Buku <span class="login-danger">*</span></label>
                                            <select name="book_id" class="form-control" placeholder="Masukkan Nama Buku" required>
                                                @foreach($books as $book)
                                                    <option value="{{ $book->id }}">{{ $book->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="nama_peminjam">Nama Peminjam <span class="login-danger">*</span></label>
                                            <input type="text" name="nama_peminjam" class="form-control" placeholder="Msukkan Nama Peminjaman" required>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="tanggal_pinjam">Tanggal Peminjaman <span class="login-danger">*</span></label>
                                            <input type="date" name="tanggal_pinjam" class="form-control datetimepicker" placeholder="DD-MM-YYYY" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="tanggal_kembali">Tanggal Pengembalian <span class="login-danger">*</span></label>
                                            <input type="date" name="tanggal_kembali" class="form-control datetimepicker" placeholder="DD-MM-YYYY" required>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="jumlah_buku">Jumlah Buku <span class="login-danger">*</span></label>
                                            <input type="number" name="jumlah_buku" class="form-control" min="1" placeholder="Masukkan Jumlah Buku" required>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
