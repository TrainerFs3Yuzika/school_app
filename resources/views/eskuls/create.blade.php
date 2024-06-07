@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Eskul Baru</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('eskuls.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Siswa:</label>
                                <select name="student_id" id="student_id" class="form-select" required>
                                    <option value="" selected disabled>Pilih Siswa</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nama_eskul" class="form-label">Nama Eskul:</label>
                                <input type="text" name="nama_eskul" id="nama_eskul" class="form-control" placeholder="Masukkan Nama Eskul" required>
                            </div>
                            <div class="mb-3">
                                <label for="pembina" class="form-label">Pembina:</label>
                                <input type="text" name="pembina" id="pembina" class="form-control" placeholder="Masukkan Nama Pembina" required>
                            </div>
                            <div class="mb-3">
                                <label for="waktu_eskul" class="form-label">Waktu Eskul:</label>
                                <input type="text" name="waktu_eskul" id="waktu_eskul" class="form-control" placeholder="Contoh: Senin, 14:00 - 16:00" required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar:</label>
                                <input type="file" name="gambar" id="gambar" class="form-control" required>
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
