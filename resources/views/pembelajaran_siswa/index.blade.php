@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Pembelajaran Siswa</h1>
    <a href="{{ route('pembelajaran_siswa.create') }}" class="btn btn-primary mb-3">Tambah Pembelajaran Siswa</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th>Siswa</th>
                <th>Guru</th>
                <th>File Materi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pembelajaranSiswa as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->subject->subject_name }}</td>
                    <td>{{ $item->subject->class ?? 'Tidak Ada Kelas' }}</td> <!-- Menampilkan kelas -->
                    <td>{{ $item->student->name }}</td>
                    <td>{{ $item->teacher->name }}</td>
                    <td>
                        @if ($item->materi_file)
                            <a href="{{ asset('storage/' . $item->materi_file) }}" target="_blank">Lihat File</a>
                        @else
                            Tidak Ada File
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pembelajaran_siswa.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('pembelajaran_siswa.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
