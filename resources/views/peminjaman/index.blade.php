@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Peminjaman Buku</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Peminjaman</li>
                            <li class="breadcrumb-item active">Daftar Peminjaman</li>
                        </ul>
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
                                    <h3 class="page-title">Daftar Peminjaman Buku</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="#" class="btn btn-outline-gray me-2 active">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-gray me-2">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Unduh</a>
                                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Tanggal Pinjam</th>
                                        <th scope="col">Tanggal Kembali</th>
                                        <th scope="col">Jumlah Buku</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($peminjamans as $key => $peminjaman)
                                    <tr>
                                        <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                        <td>{{ $peminjaman->id }}</td> <!-- ID -->
                                        <td>{{ $peminjaman->book->judul }}</td> <!-- Judul Buku -->
                                        <td>{{ $peminjaman->nama_peminjam }}</td> <!-- Nama Peminjam -->
                                        <td>{{ $peminjaman->tanggal_pinjam }}</td> <!-- Tanggal Pinjam -->
                                        <td>{{ $peminjaman->tanggal_kembali }}</td> <!-- Tanggal Kembali -->
                                        <td>{{ $peminjaman->jumlah_buku }}</td> <!-- Jumlah Buku -->
                                        <td>{{ $peminjaman->status }}</td> <!-- Status -->
                                        <td>
                                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                            </form>
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
