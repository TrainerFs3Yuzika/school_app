@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Edit Jadwal</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Jadwal</a></li>
                                <li class="breadcrumb-item active">Edit Jadwal</li>
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
                            <form action="{{ route('lessons.update', $lesson->id) }}" method="POST" class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="subject_id">Pelajaran <span class="login-danger">*</span></label>
                                        <select name="subject_id" id="subject_id"
                                            class="form-control select @error('subject_id') is-invalid @enderror" required>
                                            <option selected disabled>Masukkan Pelajaran</option>
                                            @foreach ($subjects as $id => $name)
                                                <option value="{{ $id }}" {{ $lesson->subject_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="class">Kelas <span class="login-danger">*</span></label>
                                        <select name="class" id="class" class="form-control select" required>
                                            <option selected disabled>Masukkan Kelas</option>
                                            <option value="12" {{ $lesson->class == '12' ? 'selected' : '' }}>12</option>
                                            <option value="11" {{ $lesson->class == '11' ? 'selected' : '' }}>11</option>
                                            <option value="10" {{ $lesson->class == '10' ? 'selected' : '' }}>10</option>
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="days">Hari <span class="login-danger">*</span></label>
                                        <select name="days" class="form-control select" required>
                                            <option selected disabled>Masukkan Hari</option>
                                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                                                <option value="{{ $day }}" {{ $lesson->days == $day ? 'selected' : '' }}>{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="class_type">Jurusan <span class="login-danger">*</span></label>
                                        <select name="class_type" id="class_type" class="form-control select" required>
                                            <option selected disabled>Pilih Jurusan</option>
                                            @foreach(['IPA', 'IPS', 'Bahasa', 'Agama', 'Kejuruan', 'Olahraga'] as $type)
                                                <option value="{{ $type }}" {{ $lesson->class_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="teacher_id">Guru <span class="login-danger">*</span></label>
                                        <select name="teacher_id" id="teacher_id" class="form-control select" required>
                                            <option selected disabled>Pilih Guru</option>
                                            @foreach ($teachers as $id => $name)
                                                <option value="{{ $id }}" {{ $lesson->teacher_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="student_ids">Siswa <span class="login-danger">*</span></label>
                                        <select name="student_ids[]" id="student_ids" class="form-control select" multiple required>
                                            @foreach ($students as $id => $name)
                                                <option value="{{ $id }}" {{ in_array($id, $lesson->students->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="time_start">Waktu Mulai <span class="login-danger">*</span></label>
                                        <input type="time" name="time_start" class="form-control"
                                            placeholder="Masukkan Waktu Mulai" value="{{ $lesson->time_start }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="time_end">Waktu Berakhir <span class="login-danger">*</span></label>
                                        <input type="time" name="time_end" class="form-control"
                                            placeholder="Masukkan Waktu Berakhir" value="{{ $lesson->time_end }}" required>
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('lessons.index') }}" class="btn btn-secondary ms-2">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
