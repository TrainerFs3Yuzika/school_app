@extends('layouts.master')

@section('content')
<title>Tambah Ekstrakurikuler</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Ekstrakurikuler</h3>
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
                            <div class="row">
                                <h5 class="form-title student-info">Informasi Ekstrakurikuler
                                    <span>
                                        <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                    </span>
                                </h5>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="student_id" class="form-label">Nama Siswa <span
                                                class="login-danger">*</span></label>
                                        <select name="student_id" id="student_id" class="form-control select" required>
                                            <option value="" selected disabled>Pilih Siswa</option>
                                            @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->first_name }}
                                                {{ $student->last_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="nama_eskul" class="form-label">Nama Ekstrakurikuler <span
                                                class="login-danger">*</span></label>
                                        <input type="text" name="nama_eskul" id="nama_eskul" class="form-control"
                                            placeholder="Masukkan Nama Ekstrakurikuler" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="pembina" class="form-label">Nama Pembina <span
                                                class="login-danger">*</span></label>
                                        <input type="text" name="pembina" id="pembina" class="form-control"
                                            placeholder="Masukkan Nama Pembina" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="waktu_eskul" class="form-label">Waktu Ekstrakurikulir <span
                                                class="login-danger">*</span></label>
                                        <input type="text" name="waktu_eskul" id="waktu_eskul" class="form-control"
                                            placeholder="Contoh: Senin, 14:00 - 16:00" required>
                                    </div>
                                </div>
                                <div class="mb-5">
                                    <label for="gambar" class="form-label">Gambar <span
                                            class="login-danger">*</span></label>
                                    <input type="file" name="gambar" id="gambar" class="form-control" required>
                                </div>
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
