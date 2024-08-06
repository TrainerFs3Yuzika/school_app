@extends('layouts.master')

@section('content')
<title>Detail Pendaftaran Eskul</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Detail Pendaftaran Eskul</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Eskul</li>
                            <li class="breadcrumb-item active">Detail Pendaftaran Eskul</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-detail comman-shadow">
                    <div class="card-body">
                        <h2>{{ $daftarEskul->eskul->nama_eskul }}</h2>
                        <p><strong>Nama Siswa:</strong> {{ $daftarEskul->user->name }}</p>
                        <a href="{{ route('daftar-eskul.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
