@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat Tagihan Baru</h1>
    <form action="{{ route('tagihan.store') }}" method="POST">
        @csrf
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
            <input type="number" name="jumlah_denda" id="jumlah_denda" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengunggah tugas ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Unggah',
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
