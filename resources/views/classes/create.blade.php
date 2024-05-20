<!-- resources/views/classes/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Kelas Baru</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('classes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="class_name">Nama Kelas:</label>
                <input type="text" id="class_name" name="class_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="student_id">Siswa:</label>
                <select id="student_id" name="student_id" class="form-control" required>
                    <option value="">Pilih Siswa</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->first_name }} {{ $student->last_name }}</option>
                    @endforeach
                </select>
            </div>
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
            <div class="form-group">
                <label for="start_time">Waktu Mulai:</label>
                <input type="datetime-local" id="start_time" name="start_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="end_time">Waktu Berakhir:</label>
                <input type="datetime-local" id="end_time" name="end_time" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kelas</button>
            <a href="{{ route('home') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
