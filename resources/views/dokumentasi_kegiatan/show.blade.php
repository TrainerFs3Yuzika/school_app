@extends('layouts.master')

@section('content')
<title>Detail Dokumentasi Kegiatan Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Detail Dokumentasi Kegiatan Siswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dokumentasi_kegiatan.index') }}">Dokumentasi Kegiatan Siswa</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-table comman-shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">{{ $dokumentasiKegiatanSiswa->judul }}</h4>
                            </div>
                            <div class="card-body">
                                @if ($dokumentasiKegiatanSiswa->gambar)
                                <img src="{{ asset('storage/gambar_dokumentasi/' . $dokumentasiKegiatanSiswa->gambar) }}" alt="{{ $dokumentasiKegiatanSiswa->judul }}" width="300" class="mb-3">
                                @endif
                                <p>{{ $dokumentasiKegiatanSiswa->deskripsi }}</p>
                            </div>
                            <div class="card-footer">
                                <a href="{{ route('dokumentasi_kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
