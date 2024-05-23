<!-- resources/views/books/index.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Daftar Buku</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun Terbit</th>
                    <th>Genre</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->judul }}</td>
                        <td>{{ $book->penulis }}</td>
                        <td>{{ $book->penerbit }}</td>
                        <td>{{ $book->tahun_terbit }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->stok }}</td>
                        <td>
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
