<!-- resources/views/eskuls/edit.blade.php -->

@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Eskul</h2>
                <form action="{{ route('eskuls.update', $eskul->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="student_id">Siswa:</label>
                        <select name="student_id" id="student_id" class="form-control">
                            @foreach ($students as $student)
                                <option value="{{ $student->id }}" {{ $student->id == $eskul->student_id ? 'selected' : '' }}>{{ $student->first_name }} {{ $student->last_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_eskul">Nama Eskul:</label>
                        <input type="text" name="nama_eskul" id="nama_eskul" class="form-control" value="{{ $eskul->nama_eskul }}" required>
                    </div>
                    <div class="form-group">
                        <label for="pembina">Pembina:</label>
                        <input type="text" name="pembina" id="pembina" class="form-control" value="{{ $eskul->pembina }}" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu_eskul">Waktu Eskul:</label>
                        <input type="text" name="waktu_eskul" id="waktu_eskul" class="form-control" value="{{ $eskul->waktu_eskul }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
