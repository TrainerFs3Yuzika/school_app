<!-- resources/views/peminjaman/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Peminjaman Buku</h1>
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="book_id">Judul Buku:</label>
                <select name="book_id" class="form-control" required>
                    @foreach($books as $book)
                        <option value="{{ $book->id }}">{{ $book->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_peminjam">Nama Peminjam:</label>
                <input type="text" name="nama_peminjam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam:</label>
                <input type="date" name="tanggal_pinjam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali:</label>
                <input type="date" name="tanggal_kembali" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku:</label>
                <input type="number" name="jumlah_buku" class="form-control" min="1" required>
            </div>
            {{-- <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="belum_dikembalikan">Belum Dikembalikan</option>
                    <option value="sudah_dikembalikan">Sudah Dikembalikan</option>
                    <option value="diterima">Diterima</option>
                    <option value="ditolak">Ditolak</option>
                </select>
            </div> --}}
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
