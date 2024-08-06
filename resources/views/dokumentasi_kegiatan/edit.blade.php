@extends('layouts.master')

@section('content')
<title>Edit Dokumentasi Kegiatan Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Dokumentasi Kegiatan Siswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dokumentasi_kegiatan.index') }}">Dokumentasi Kegiatan Siswa</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- pesan --}}
        {!! Toastr::message() !!}
        
        <div class="card card-table comman-shadow">
            <div class="card-body">
                <form action="{{ route('dokumentasi_kegiatan.update', $dokumentasiKegiatanSiswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $dokumentasiKegiatanSiswa->judul) }}" required>
                        @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                        @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($dokumentasiKegiatanSiswa->gambar)
                        <img src="{{ asset('storage/gambar_dokumentasi/' . $dokumentasiKegiatanSiswa->gambar) }}" alt="{{ $dokumentasiKegiatanSiswa->judul }}" width="100" class="mt-2">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3" required>{{ old('deskripsi', $dokumentasiKegiatanSiswa->deskripsi) }}</textarea>
                        @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
