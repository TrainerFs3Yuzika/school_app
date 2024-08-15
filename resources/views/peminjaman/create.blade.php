@extends('layouts.master')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Peminjaman</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('peminjaman.index') }}">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Tambah Peminjaman</li>
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
                        <form id="peminjamanForm" action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <h5 class="form-title student-info">Informasi Peminjaman</h5>
                                    <div class="form-group">
                                        <label for="book_id">Judul Buku <span class="text-danger">*</span></label>
                                        <select id="book_id" name="book_id" class="form-control select2" required>
                                            @foreach ($books as $book)
                                                <option value="{{ $book->id }}" data-stok="{{ $book->stok }}">{{ $book->judul }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">Peminjam</label>
                                        <select name="user_id" id="user_id" class="form-control select2">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal_pinjam">Tanggal Peminjaman <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_pinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror" value="{{ old('tanggal_pinjam') }}" required>
                                        @error('tanggal_pinjam')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tanggal_kembali">Tanggal Pengembalian <span class="text-danger">*</span></label>
                                        <input type="date" name="tanggal_kembali" class="form-control @error('tanggal_kembali') is-invalid @enderror" value="{{ old('tanggal_kembali') }}" required>
                                        @error('tanggal_kembali')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah_buku">Jumlah Buku <span class="text-danger">*</span></label>
                                        <input type="number" id="jumlah_buku" name="jumlah_buku" class="form-control @error('jumlah_buku') is-invalid @enderror" min="1" value="{{ old('jumlah_buku') }}" required>
                                        @error('jumlah_buku')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning ms-2">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Include Select2 CSS and JS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Select2 for book and user selection
            $('.select2').select2({
                width: '100%' // Adjust width to match container
            });

            // Confirm before submitting form
            document.querySelector('#peminjamanForm').addEventListener('submit', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menyimpan peminjaman ini?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, Simpan',
                    cancelButtonText: 'Tidak',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
