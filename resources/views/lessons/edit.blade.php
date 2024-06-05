@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Tambah Jadwal</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">Jadwal</a></li>
                                <li class="breadcrumb-item active">Tambah Jadwal</li>
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
                            <h5 class="form-title student-info">Informasi Jadwal
                                <span>
                                    <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                </span>
                            </h5>
                            <form action="{{ route('lessons.update', $lessons->id) }}" method="POST" class="row">
                                @csrf
                                @method('PUT')
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="subject_id">Pelajaran <span class="login-danger">*</span></label>
                                        <select name="subject_id" id="subject_id"
                                            class="form-control select @error('subject_id') is-invalid @enderror" required>
                                            @foreach ($subjects as $id => $name)
                                                <option value="{{ $id }}"
                                                    @if (old('subject_id', $name) == $id) selected @endif>{{ $name }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="class">Kelas <span class="login-danger">*</span></label>
                                        <select name="class" id="class" class="form-control select">
                                            <option>{{ $lessons->class }}</option>
                                            <option value="12">12</option>
                                            <option value="11">11</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="days">Hari <span class="login-danger">*</span></label>
                                        <select name="days" class="form-control select" required>
                                            <option value="Senin" {{ $lessons->days == 'Senin' ? 'selected' : '' }}>Senin
                                            </option>
                                            <option value="Selasa" {{ $lessons->days == 'Selasa' ? 'selected' : '' }}>Selasa
                                            </option>
                                            <option value="Rabu" {{ $lessons->days == 'Rabu' ? 'selected' : '' }}>Rabu
                                            </option>
                                            <option value="Kamis" {{ $lessons->days == 'Kamis' ? 'selected' : '' }}>Kamis
                                            </option>
                                            <option value="Jumat" {{ $lessons->days == 'Jumat' ? 'selected' : '' }}>Jumat
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="time_start">Waktu Mulai <span class="login-danger">*</span></label>
                                        <input type="time" name="time_start" class="form-control"
                                            value="{{ $lessons->time_start }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="time_end">Waktu Berakhir <span class="login-danger">*</span></label>
                                        <input type="time" name="time_end" class="form-control"
                                            value="{{ $lessons->time_end }}" required>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="reset" class="btn btn-warning ms-2">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
