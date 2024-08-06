@extends('layouts.master')

@section('content')
<title>Detail Tugas</title>
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
                            <li class="breadcrumb-item active">Detail Tugas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Assignment Details -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="display-4">Detail Tugas</h1>
                                    <div class="card mb-4 shadow-sm">
                                        <div class="card-body">
                                            <p><strong>Assignment Name:</strong> {{ $assignment->assignment_name }}</p>
                                            <p><strong>Subject:</strong> {{ $assignment->subject->subject_name }}</p>
                                            <p><strong>Uploaded By:</strong> {{ $assignment->user->name }}</p>
                                            <p><strong>File:</strong>
                                                <a href="{{ route('assignments.download', $assignment->id) }}" class="btn btn-outline-success">Download File</a>
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('assignments.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
