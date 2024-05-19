@extends('layouts.master')
@section('content')
{{-- pesan --}}
{!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Edit Departemen</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="departments.html">Departemen</a></li>
                            <li class="breadcrumb-item active">Edit Departemen</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('department/update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Detail Departemen</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Nama Departemen <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="department_name" value="{{ $department->department_name }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Kepala Departemen <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="head_of_department" value="{{ $department->head_of_department }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms calendar-icon">
                                            <label>Tanggal Mulai Departemen <span class="login-danger">*</span></label>
                                            <input class="form-control datetimepicker" type="text"placeholder="DD-MM-YYYY" name="department_start_date" value="{{ $department->department_start_date }}">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Jumlah Mahasiswa <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="no_of_students" value="{{ $department->no_of_students }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="student-submit">
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
