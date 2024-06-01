<!-- resources/views/scores/create.blade.php -->
@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Form Penilaian Siswa</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Nilai Siswa</a></li>
                                <li class="breadcrumb-item active">Form Penilaian Siswa</li>
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
                            <form action="{{ route('scores.store') }}" method="POST" id="createScoreForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title">Informasi Penilaian
                                            <span>
                                                <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="teacher_id">Guru <span class="login-danger">*</span></label>
                                            <select name="teacher_id" id="teacher_id" class="form-control select">
                                                <option selected disabled>Silahkan Pilih Guru</option>
                                                @foreach ($teachers as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="student_id">Siswa <span class="login-danger">*</span></label>
                                            <select name="student_id" id="student_id" class="form-control select">
                                                <option selected disabled>Silahkan Pilih Siswa</option>
                                                @foreach ($students as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label for="subject_id">Mata Pelajaran <span
                                                    class="login-danger">*</span></label>
                                            <select name="subject_id" id="subject_id" class="form-control select">
                                                <option selected disabled>Silahkan Pilih Mata Pelajaran</option>
                                                @foreach ($subjects as $id => $name)
                                                    <option value="{{ $id }}">{{ $name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group local-forms">
                                            <label for="score">Nilai <span class="login-danger">*</span></label>
                                            <input type="number" name="score" id="score" class="form-control"
                                                min="0" placeholder="Silahkan Masukkan Nilai" required>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Kirim</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Validasi di sisi klien menggunakan HTML5
        document.getElementById('createScoreForm').addEventListener('submit', function(event) {
            const scoreInput = document.getElementById('score');
            if (scoreInput.validity.rangeUnderflow) {
                alert('Nilai harus lebih besar atau sama dengan 0.');
                event.preventDefault();
            }
        });
    </script>
@endpush

