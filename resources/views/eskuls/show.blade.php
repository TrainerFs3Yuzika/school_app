@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Detail</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Nama Siswa: {{ $eskul->student->first_name }} {{ $eskul->student->last_name }}</h5>
                        <p class="card-text fw-bold">Pembina: {{ $eskul->pembina }}</p>
                        <p class="card-text">Ekstrakurikuler: {{ $eskul->nama_eskul }}</p>
                        <p class="card-text">Waktu : <b>{{ $eskul->waktu_eskul }}</b></p>
                        <img src="{{ asset('images/' . $eskul->gambar) }}" alt="Gambar Eskul" class="img-fluid mb-3" style="max-width: 300px;">
                        <br>
                        <a href="{{ route('eskuls.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
