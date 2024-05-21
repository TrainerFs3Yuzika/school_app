@extends('layouts.master')
@section('content')
{{-- pesan --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Tambahkan Data Kelas</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="classes.html">Kelas</a></li>
                        <li class="breadcrumb-item active">Tambahkan Data Kelas</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('classes.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="class_name">Nama Kelas:</label>
                                        <input type="text" id="class_name" name="class_name" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="student_id">Siswa:</label>
                                        <select id="student_id" name="student_id" class="form-control" required>
                                            <option value="">Pilih Siswa</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="teacher_id">Guru:</label>
                                        <select id="teacher_id" name="teacher_id" class="form-control" required>
                                            <option value="">Pilih Guru</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->full_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="subject_id">Kelas:</label>
                                        <select id="subject_id" name="subject_id" class="form-control" required>
                                            <option value="">Pilih Kelas</option>
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}">{{ $subject->class }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_time">Waktu Mulai:</label>
                                        <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_time">Waktu Berakhir:</label>
                                        <input type="datetime-local" id="end_time" name="end_time" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Kelas</button>
                            <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
<script>
    // pilih otomatis id guru
    $('#full_name').on('change',function()
    {
        $('#teacher_id').val($(this).find(':selected').data('teacher_id'));
    });
</script>
@endsection
@endsection