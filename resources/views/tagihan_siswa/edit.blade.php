@extends('layouts.master')

@section('content')
<title>Edit Tagihan</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Tagihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('tagihan_siswa.index') }}">Tagihan</a></li>
                            <li class="breadcrumb-item active">Edit Tagihan</li>
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
                <form action="{{ route('tagihan_siswa.update', $tagihan->id) }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Penting untuk menggunakan metode PUT -->

                    <div class="form-group">
                        <label for="user_id">Nama Siswa</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                            <option value="" disabled selected>Pilih Siswa</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $tagihan->user_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="payment_type">Jenis Tagihan</label>
                        <select class="form-control" id="payment_type" name="payment_type" required>
                            <option value="Biaya Pendidikan" {{ $tagihan->payment_type == 'Biaya Pendidikan' ? 'selected' : '' }}>Biaya Pendidikan</option>
                            <option value="Seragam Sekolah" {{ $tagihan->payment_type == 'Seragam Sekolah' ? 'selected' : '' }}>Seragam Sekolah</option>
                            <option value="Buku dan Materi Pelajaran" {{ $tagihan->payment_type == 'Buku dan Materi Pelajaran' ? 'selected' : '' }}>Buku dan Materi Pelajaran</option>
                            <option value="Kegiatan Ekstrakurikuler" {{ $tagihan->payment_type == 'Kegiatan Ekstrakurikuler' ? 'selected' : '' }}>Kegiatan Ekstrakurikuler</option>
                            <option value="Makanan dan Kantin" {{ $tagihan->payment_type == 'Makanan dan Kantin' ? 'selected' : '' }}>Makanan dan Kantin</option>
                            <option value="Transportasi" {{ $tagihan->payment_type == 'Transportasi' ? 'selected' : '' }}>Transportasi</option>
                            <option value="Biaya Acara dan Perjalanan" {{ $tagihan->payment_type == 'Biaya Acara dan Perjalanan' ? 'selected' : '' }}>Biaya Acara dan Perjalanan</option>
                            <option value="Biaya Teknologi" {{ $tagihan->payment_type == 'Biaya Teknologi' ? 'selected' : '' }}>Biaya Teknologi</option>
                            <option value="Biaya Tambahan" {{ $tagihan->payment_type == 'Biaya Tambahan' ? 'selected' : '' }}>Biaya Tambahan</option>
                            <option value="Denda Buku" {{ $tagihan->payment_type == 'Denda Buku' ? 'selected' : '' }}>Denda Buku</option>
                            <option value="Donasi dan Sumbangan" {{ $tagihan->payment_type == 'Donasi dan Sumbangan' ? 'selected' : '' }}>Donasi dan Sumbangan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="amount">Jumlah</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ old('amount', $tagihan->amount) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>

                <a href="{{ route('tagihan_siswa.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
