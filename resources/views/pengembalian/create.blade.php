@extends('layouts.master')

@section('content')
    <title>Tambah Pengembalian</title>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Tambah Pengembalian Buku</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('pengembalian.index') }}">Pengembalian</a></li>
                                <li class="breadcrumb-item active">Tambah Pengembalian</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <!-- Formulir untuk Menambahkan Pengembalian -->
                            @if($peminjaman)
                            <form action="{{ route('pengembalian.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
                                
                                <div class="form-group">
                                    <label for="tanggal_pengembalian">Tanggal Pengembalian:</label>
                                    <input type="date" name="tanggal_pengembalian" id="tanggal_pengembalian" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="denda">Denda:</label>
                                    <input type="number" name="denda" id="denda" class="form-control" step="0.01">
                                </div>

                                <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
                            </form>
                            @else
                            <p>Peminjaman tidak ditemukan.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
