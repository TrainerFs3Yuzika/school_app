@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Daftar Buku</h3>
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
                    <!-- Search form -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Daftar Buku</h3>
                                    </div>
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <!-- Buttons -->
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
                                <table class="table border-0 star-book table-hover table-center mb-0 datatable table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Judul Buku</th>
                                            <th scope="col">Penulis</th>
                                            <th scope="col">Penerbit</th>
                                            <th scope="col">Tahun Terbit</th>
                                            <th scope="col">Genre</th>
                                            <th scope="col">Stok</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="">
                                        @foreach ($books as $key => $book)
                                            <tr>
                                                <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                                <td>{{ $book->id }}</td> <!-- ID -->
                                                <td>{{ $book->judul }}</td> <!-- Judul -->
                                                <td>{{ $book->penulis }}</td> <!-- Penulis -->
                                                <td>{{ $book->penerbit }}</td> <!-- Penerbit -->
                                                <td>{{ $book->tahun_terbit }}</td> <!-- Tahun Terbit -->
                                                <td>{{ $book->genre }}</td> <!-- Genre -->
                                                <td>{{ $book->stok }}</td> <!-- Stok -->
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm bg-danger-light">
                                                            <i class="far fa-edit me-2"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                                <i class="far fa-trash-alt me-2"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td> <!-- Aksi -->
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

@endsection

@section('script')
    {{-- js hapus --}}
    <script>
        $(document).on('click', '.book_delete', function() {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
        });
    </script>
@endsection
