@extends('layouts.master')

@section('content')
<title>Detail Tagihan</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Detail Tagihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('tagihan.index') }}">Tagihan</a></li>
                            <li class="breadcrumb-item active">Detail Tagihan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <td>{{ $tagihan->id }}</td>
                            </tr>
                            <tr>
                                <th>Nama Peminjam</th>
                                <td>{{ $tagihan->peminjaman->nama_peminjam }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah Denda</th>
                                <td>{{ $tagihan->jumlah_denda }}</td>
                            </tr>
                            <tr>
                                <th>Status Lunas</th>
                                <td>{{ $tagihan->lunas ? 'Lunas' : 'Belum Lunas' }}</td>
                            </tr>
                        </table>
                        <a href="{{ route('tagihan.index') }}" class="btn btn-primary mt-3">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        var successMessage = '{{ Session::get('success') }}';
        var errorMessage = '{{ Session::get('error') }}';

        if (successMessage) {
            toastr.success(successMessage, 'Sukses');
        }
        if (errorMessage) {
            toastr.error(errorMessage, 'Error');
        }
    });
</script>
@endsection
