<!-- resources/views/books/edit_book.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Buku</h1>
        <form action="{{ route('books.update', $book->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" class="form-control" value="{{ $book->judul }}" required>
            </div>
            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" class="form-control" value="{{ $book->penulis }}" required>
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" name="penerbit" class="form-control" value="{{ $book->penerbit }}" required>
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" name="tahun_terbit" class="form-control" value="{{ $book->tahun_terbit }}" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre:</label>
                <select name="genre" class="form-control" required>
                    <option value="fiksi" {{ $book->genre == 'fiksi' ? 'selected' : '' }}>Fiksi</option>
                    <option value="non-fiksi" {{ $book->genre == 'non-fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                    <option value="pelajaran" {{ $book->genre == 'pelajaran' ? 'selected' : '' }}>Pelajaran</option>
                </select>
            </div>
            <div class="form-group">
                <label for="stok">Stok:</label>
                <input type="number" name="stok" class="form-control" value="{{ $book->stok }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
