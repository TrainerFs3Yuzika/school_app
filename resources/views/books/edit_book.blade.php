<!-- resources/views/books/edit_book.blade.php -->
@extends('layouts.master')
@section('content')
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
