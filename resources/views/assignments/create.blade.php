@extends('layouts.master')

@section('content')
<title>Unggah Tugas</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: purple;">Tugas</li>
                            <li class="breadcrumb-item active">Unggah Tugas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upload Assignment Form -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <h1 class="display-4 mb-4">Unggah Tugas</h1>
                        @if (Auth::check())
                            <form action="{{ route('assignments.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- User's Name Field -->
                                <div class="form-group mt-3">
                                    <label for="user_name">Nama Siswa:</label>
                                    <input type="text" id="user_name" name="user_name" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                    <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
                                </div>

                                <!-- Select Subject -->
                                <div class="form-group mt-3">
                                    <label for="subject_id">Pilih Mata Pelajaran:</label>
                                    <select name="subject_id" id="subject_id" class="form-control select2" required>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Upload File -->
                                <div class="form-group mt-3">
                                    <label for="file">Unggah Berkas (Hanya PDF):</label>
                                    <input type="file" name="file" id="file" class="form-control" accept=".pdf" required>
                                    <small class="form-text text-muted">Unggah file dengan format PDF. Maksimal ukuran file adalah 2 MB.</small>
                                </div>
                                

                                <!-- Submit Button -->
                                <div class="form-group mt-3">
                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                </div>
                            </form>
                        @else
                            <p>Anda perlu login untuk mengunggah tugas.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Select2 CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Select2 for subject selection
        $('#subject_id').select2({
            width: '100%' // Adjust width to match container
        });

        // Confirm before submitting form
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengunggah tugas ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Unggah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
@endsection
