<!-- resources/views/peminjaman/edit.blade.php -->
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Peminjaman Buku</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                                <li class="breadcrumb-item active">Edit Peminjaman</li>
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
                            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <h5 class="form-title student-info">Informasi Peminjaman
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="book_id">Judul Buku <span class="login-danger">*</span></label>
                                            <select name="book_id" class="form-control select" required>
                                                <option selected disabled>Pilih Nama Buku</option>
                                                @foreach ($books as $book)
                                                    <option value="{{ $book->id }}"
                                                        {{ $book->id == $peminjaman->book_id ? 'selected' : '' }}>
                                                        {{ $book->judul }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="nama_peminjam">Nama Peminjam <span
                                                    class="login-danger">*</span></label>
                                            <input type="text" name="nama_peminjam" class="form-control"
                                                value="{{ $peminjaman->nama_peminjam }}" required>
                                        </div>
                                        <div class="form-group local-forms">
                                            <label for="tanggal_pinjam">Tanggal Peminjaman <span
                                                    class="login-danger">*</span></label>
                                            <input type="date" name="tanggal_pinjam" class="form-control"
                                                value="{{ $peminjaman->tanggal_pinjam }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="tanggal_kembali">Tanggal Pengembalian <span
                                                    class="login-danger">*</span></label>
                                            <input type="date" name="tanggal_kembali" class="form-control"
                                                value="{{ $peminjaman->tanggal_kembali }}" required>
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="jumlah_buku">Jumlah Buku <span class="login-danger">*</span></label>
                                            <input type="number" name="jumlah_buku" class="form-control"
                                                value="{{ $peminjaman->jumlah_buku }}" min="1" required>
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="status">Status:</label>
                                            <select name="status" class="form-control select" required>
                                                <option value="belum_dikembalikan"
                                                    {{ $peminjaman->status == 'belum_dikembalikan' ? 'selected' : '' }}>
                                                    Belum Dikembalikan
                                                </option>
                                                <option value="sudah_dikembalikan"
                                                    {{ $peminjaman->status == 'sudah_dikembalikan' ? 'selected' : '' }}>
                                                    Sudah Dikembalikan
                                                </option>
                                                <option value="diterima"
                                                    {{ $peminjaman->status == 'diterima' ? 'selected' : '' }}>
                                                    Diterima</option>
                                                <option value="ditolak"
                                                    {{ $peminjaman->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <button type="reset" class="btn btn-warning ms-2">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


{{-- @extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Peminjaman Buku</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                                <li class="breadcrumb-item active">Edit Peminjaman</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group local-forms">
                            <label for="book_id">Judul Buku:</label>
                            <select name="book_id" class="form-control" required>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}"
                                        {{ $book->id == $peminjaman->book_id ? 'selected' : '' }}>{{ $book->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group local-forms">
                            <label for="nama_peminjam">Nama Peminjam:</label>
                            <input type="text" name="nama_peminjam" class="form-control"
                                value="{{ $peminjaman->nama_peminjam }}" required>
                        </div>
                        <div class="form-group local-forms">
                            <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                            <input type="date" name="tanggal_pinjam" class="form-control"
                                value="{{ $peminjaman->tanggal_pinjam }}" required>
                        </div>
                        <div class="form-group local-forms">
                            <label for="tanggal_kembali">Tanggal Kembali:</label>
                            <input type="date" name="tanggal_kembali" class="form-control"
                                value="{{ $peminjaman->tanggal_kembali }}" required>
                        </div>
                        <div class="form-group local-forms">
                            <label for="jumlah_buku">Jumlah Buku:</label>
                            <input type="number" name="jumlah_buku" class="form-control"
                                value="{{ $peminjaman->jumlah_buku }}" min="1" required>
                        </div>
                        <div class="form-group local-forms">
                            <label for="status">Status:</label>
                            <select name="status" class="form-control" required>
                                <option value="belum_dikembalikan"
                                    {{ $peminjaman->status == 'belum_dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan
                                </option>
                                <option value="sudah_dikembalikan"
                                    {{ $peminjaman->status == 'sudah_dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan
                                </option>
                                <option value="diterima" {{ $peminjaman->status == 'diterima' ? 'selected' : '' }}>
                                    Diterima</option>
                                <option value="ditolak" {{ $peminjaman->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <button type="reset" class="btn btn-warning ms-2">Reset</button>
            </form>
        </div>
    </div>
@endsection --}}
