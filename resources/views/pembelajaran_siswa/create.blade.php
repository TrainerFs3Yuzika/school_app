@extends('layouts.master')

@section('content')
<title>Create Pembelajaran Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Create Pembelajaran Siswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('pembelajaran_siswa.index') }}">Pembelajaran Siswa</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-table comman-shadow">
            <div class="card-body">
                <form action="{{ route('pembelajaran_siswa.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="subject_id">Mata Pelajaran</label>
                        <select id="subject_id" name="subject_id" class="form-control">
                            <option value="">-- Pilih Mata Pelajaran --</option>
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="class">Kelas</label>
                        <input type="text" id="class" name="class" class="form-control" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="student_id">Siswa</label>
                        <select id="student_id" name="student_id" class="form-control">
                            <option value="">-- Pilih Siswa --</option>
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="teacher_id">Guru</label>
                        <select id="teacher_id" name="teacher_id" class="form-control">
                            <option value="">-- Pilih Guru --</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="materi_file">File Materi</label>
                        <input type="file" id="materi_file" name="materi_file" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('pembelajaran_siswa.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
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
