@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Pembelajaran Siswa</h1>
    <form action="{{ route('pembelajaran_siswa.update', $pembelajaranSiswa->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="subject_id">Mata Pelajaran</label>
            <select id="subject_id" name="subject_id" class="form-control">
                <option value="">-- Pilih Mata Pelajaran --</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $subject->id == $pembelajaranSiswa->subject_id ? 'selected' : '' }}>
                        {{ $subject->subject_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="class">Kelas</label>
            <input type="text" id="class" name="class" class="form-control" value="{{ $pembelajaranSiswa->subject->class ?? 'Tidak Ada Kelas' }}" readonly>
        </div>

        <div class="form-group">
            <label for="student_id">Siswa</label>
            <select id="student_id" name="student_id" class="form-control">
                <option value="">-- Pilih Siswa --</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}" {{ $student->id == $pembelajaranSiswa->student_id ? 'selected' : '' }}>
                        {{ $student->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="teacher_id">Guru</label>
            <select id="teacher_id" name="teacher_id" class="form-control">
                <option value="">-- Pilih Guru --</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == $pembelajaranSiswa->teacher_id ? 'selected' : '' }}>
                        {{ $teacher->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="materi_file">File Materi (optional)</label>
            <input type="file" id="materi_file" name="materi_file" class="form-control">
            @if ($pembelajaranSiswa->materi_file)
                <a href="{{ asset('storage/' . $pembelajaranSiswa->materi_file) }}" target="_blank">Lihat File Saat Ini</a>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
