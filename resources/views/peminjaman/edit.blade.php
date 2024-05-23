<!-- resources/views/peminjaman/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Peminjaman Buku</h1>
        <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="book_id">Judul Buku:</label>
                <select name="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ $book->id == $peminjaman->book_id ? 'selected' : '' }}>{{ $book->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_peminjam">Nama Peminjam:</label>
                <input type="text" name="nama_peminjam" class="form-control" value="{{ $peminjaman->nama_peminjam }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" name="tanggal_pinjam" class="form-control" value="{{ $peminjaman->tanggal_pinjam }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali" class="form-control" value="{{ $peminjaman->tanggal_kembali }}" required>
            </div>
            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku:</label>
                <input type="number" name="jumlah_buku" class="form-control" value="{{ $peminjaman->jumlah_buku }}" min="1" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="belum_dikembalikan" {{ $peminjaman->status == 'belum_dikembalikan' ? 'selected' : '' }}>Belum Dikembalikan</option>
                    <option value="sudah_dikembalikan" {{ $peminjaman->status == 'sudah_dikembalikan' ? 'selected' : '' }}>Sudah Dikembalikan</option>
                    <option value="diterima" {{ $peminjaman->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ $peminjaman->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
