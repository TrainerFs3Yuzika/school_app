<!-- resources/views/books/create_book.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Buku Baru</h1>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" name="penerbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select name="genre" class="form-control" required>
                    <option value="fiksi">Fiksi</option>
                    <option value="non-fiksi">Non-Fiksi</option>
                    <option value="pelajaran">Pelajaran</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" name="stok" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
