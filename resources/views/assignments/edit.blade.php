@extends('layouts.master')

@section('content')
<title>Edit Assignment</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: purple;">Tugas</li>
                            <li class="breadcrumb-item"><a href="{{ route('assignments.index') }}">Semua Tugas</a></li>
                            <li class="breadcrumb-item active">Edit Tugas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Assignment Form -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <h1 class="display-4 mb-4">Edit Tugas</h1>
                        <form action="{{ route('assignments.update', $assignment->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return confirmEdit()">
                            @csrf
                            @method('PUT')

                            <!-- User's Name Field (Read-Only) -->
                            <div class="form-group mt-3">
                                <label for="user_name">Nama Siswa:</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                            </div>

                            <!-- Select Subject -->
                            <div class="form-group mt-3">
                                <label for="subject_id">Pilih Mata Pelajaran:</label>
                                <select name="subject_id" id="subject_id" class="form-control" required>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}" {{ $assignment->subject_id == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->subject_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Upload New File -->
                            <div class="form-group mt-3">
                                <label for="file">Unggah Berkas Baru (Kosongkan jika tidak memperbarui):</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Perbarui</button>
                                <a href="{{ route('assignments.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function confirmEdit() {
        return confirm('Apakah Anda yakin ingin memperbarui tugas ini?');
    }
</script>
