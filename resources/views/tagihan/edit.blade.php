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
                            <li class="breadcrumb-item"><a href="{{ route('tagihan.index') }}">Tagihan</a></li>
                            <li class="breadcrumb-item active">Edit Tagihan</li>
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
                        <form action="{{ route('tagihan.update', $tagihan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="peminjaman_id">Peminjaman</label>
                                <select name="peminjaman_id" id="peminjaman_id" class="form-control" required>
                                    <option value="">Pilih Peminjaman</option>
                                    @foreach ($peminjaman as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->user->name }} (ID: {{ $item->id }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="jumlah_denda">Jumlah Denda</label>
                                <input type="number" name="jumlah_denda" id="jumlah_denda" class="form-control" value="{{ $tagihan->jumlah_denda }}">
                            </div>
                            <div class="form-group">
                                <label for="lunas">Status Lunas</label>
                                <select name="lunas" id="lunas" class="form-control">
                                    <option value="0" {{ $tagihan->lunas ? '' : 'selected' }}>Belum Lunas</option>
                                    <option value="1" {{ $tagihan->lunas ? 'selected' : '' }}>Lunas</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
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
