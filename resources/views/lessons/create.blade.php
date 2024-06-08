@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Tambah Jadwal</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Jadwal</a></li>
                                <li class="breadcrumb-item active">Tambah Jadwal</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- pesan --}}
            {!! Toastr::message() !!}
            <div class="row">
                <div class="col-sm-12">
                    <div class="card comman-shadow">
                        <div class="card-body">
                            <h5 class="form-title student-info">Informasi Jadwal
                                <span>
                                    <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                </span>
                            </h5>
                            <form action="{{ route('lessons.store') }}" method="POST" class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="subject_id">Pelajaran <span class="login-danger">*</span></label>
                                        <select name="subject_id" id="subject_id"
                                            class="form-control select  @error('subject_id') is-invalid @enderror" required>
                                            <option selected disabled>Masukkan Pelajaran</option>
                                            @foreach ($subjects as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="class">Kelas <span class="login-danger">*</span></label>
                                        <select name="class" id="class" class="form-control select">
                                            <option selected disabled>Masukkan Kelas</option>
                                            <option value="12">12</option>
                                            <option value="11">11</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="days">Hari <span class="login-danger">*</span></label>
                                        <select name="days" class="form-control select" required>
                                            <option selected disabled>Masukkan Hari</option>
                                            <option value="Senin">Senin</option>
                                            <option value="Selasa">Selasa</option>
                                            <option value="Rabu">Rabu</option>
                                            <option value="Kamis">Kamis</option>
                                            <option value="Jumat">Jumat</option>
                                            <option value="Sabtu">Sabtu</option>
                                            <option value="Minggu">Minggu</option>
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="class">Tipe <span class="login-danger">*</span></label>
                                        <select name="class_type" id="class_type" class="form-control select">
                                            <option selected disabled>Masukkan Tipe Kelas</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="time_start">Waktu Mulai <span class="login-danger">*</span></label>
                                        <input type="time" name="time_start" class="form-control"
                                            placeholder="Masukkan Waktu Mulai" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="time_end">Waktu Berakhir <span class="login-danger">*</span></label>
                                        <input type="time" name="time_end" class="form-control"
                                            placeholder="Masukkan Waktu Berakhir" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning ms-2">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
