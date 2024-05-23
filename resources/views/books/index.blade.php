<!-- resources/views/books/index.blade.php -->

@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Buku</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Buku</li>
                                <li class="breadcrumb-item active">Semua Buku</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pesan --}}
            {!! Toastr::message() !!}
            <div class="book-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan Judul ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Cari berdasarkan Penulis ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-book-btn">
                            <button type="btn" class="btn btn-primary">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Buku</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="#" class="btn btn-outline-gray me-2 active">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-gray me-2">
                                            <i class="fa fa-th" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i
                                                class="fas fa-download"></i> Unduh</a>
                                        <a href="{{ route('books.create') }}" class="btn btn-primary"><i
                                                class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table
                                    class="table border-0 star-book table-hover table-center mb-0 datatable table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Judul</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <th>Genre</th>
                                            <th>Stok</th>
                                            <th class="text-end">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>STD{{ ++$key }}</td>
                                                <td>{{ $book->judul }}</td>
                                                <td>{{ $book->penulis }}</td>
                                                <td>{{ $book->penerbit }}</td>
                                                <td>{{ $book->tahun_terbit }}</td>
                                                <td>{{ $book->genre }}</td>
                                                <td>{{ $book->stok }}</td>
                                                <td>
                                                    <a href="{{ route('books.edit', $book->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                        style="display: inline;">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@section('script')
    {{-- js hapus --}}
    <script>
        $(document).on('click', '.book_delete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
@endsection
@endsection
