@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Pembelajaran Siswa</h1>
    <form action="{{ route('pembelajaran_siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="subject_id">Mata Pelajaran</label>
            <select id="subject_id" name="subject_id" class="form-control">
                <option value="">-- Pilih Mata Pelajaran --</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="class">Kelas</label>
            <input type="text" id="class" name="class" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="student_id">Siswa</label>
            <select id="student_id" name="student_id" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="teacher_id">Guru</label>
            <select id="teacher_id" name="teacher_id" class="form-control">
                <option value="">-- Pilih Guru --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="materi_file">File Materi</label>
            <input type="file" id="materi_file" name="materi_file" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pembelajaran_siswa.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var subjectSelect = document.getElementById('subject_id');
    var classInput = document.getElementById('class');

    subjectSelect.addEventListener('change', function() {
        var subjectId = this.value;

        // Clear previous class input value
        classInput.value = '';

        if (subjectId) {
            fetch('/pembelajaran_siswa/getClassBySubject/' + subjectId)
                .then(response => response.json())
                .then(data => {
                    if (data.class !== null) {
                        classInput.value = data.class;
                    } else {
                        classInput.value = '';
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    });
});
</script>
@endsection
