@extends('layouts.master')

@section('content')
<title>Tambah Tagihan</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Tagihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('tagihan_siswa.index') }}">Tagihan</a></li>
                            <li class="breadcrumb-item active">Tambah Tagihan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pesan Sukses atau Error --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card card-table comman-shadow">
            <div class="card-body">
                <form action="{{ route('tagihan_siswa.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="user_id">Nama Siswa</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Pilih Siswa</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Pilih siswa dari daftar.</small>
                    </div>

                    <div class="form-group">
                        <label for="payment_type">Jenis Tagihan</label>
                        <select class="form-control" id="payment_type" name="payment_type" required>
                            <option value="" disabled selected>Pilih Jenis Tagihan</option>
                            <option value="Biaya Pendidikan">Biaya Pendidikan</option>
                            <option value="Seragam Sekolah">Seragam Sekolah</option>
                            <option value="Buku dan Materi Pelajaran">Buku dan Materi Pelajaran</option>
                            <option value="Kegiatan Ekstrakurikuler">Kegiatan Ekstrakurikuler</option>
                            <option value="Makanan dan Kantin">Makanan dan Kantin</option>
                            <option value="Transportasi">Transportasi</option>
                            <option value="Biaya Acara dan Perjalanan">Biaya Acara dan Perjalanan</option>
                            <option value="Biaya Teknologi">Biaya Teknologi</option>
                            <option value="Biaya Tambahan">Biaya Tambahan</option>
                            <option value="Denda Buku">Denda Buku</option>
                            <option value="Donasi dan Sumbangan">Donasi dan Sumbangan</option>
                        </select>
                        <small class="form-text text-muted">Pilih jenis tagihan yang sesuai.</small>
                    </div>

                    <div class="form-group">
                        <label for="amount">Jumlah</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" placeholder="Masukkan jumlah tagihan" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                
                <a href="{{ route('tagihan_siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#user_id').select2({
            placeholder: "Pilih Siswa",
            allowClear: true
        });
    });
</script>
@endsection
