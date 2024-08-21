@extends('layouts.master')

@section('content')
<title>Daftar Tugas</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item" style="color: purple;">Tugas</li>
                            <li class="breadcrumb-item active">Semua Tugas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- pesan --}}
        {!! Toastr::message() !!}

        <div class="assignment-group-form">
            <div class="row">
                <!-- Search form (if any) -->
            </div>
        </div>

        <br>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="container mt-5">
                                    <div class="row justify-content-center">
                                        <div class="col-12 text-center p-4">
                                            <h1 class="display-4">
                                                Daftar Tugas
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                  
                                        <a href="{{ route('assignments.create') }}" class="btn btn-primary">Tambah Tugas <i class="fas fa-plus"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="assignmentTable" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Assignment Name</th>
                                        <th>Subject</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assignments as $assignment)
                                        <tr>
                                            <td>{{ $assignment->assignment_name }}</td>
                                            <td>{{ $assignment->subject->subject_name }}</td>
                                            <td>
                                                <a href="{{ route('assignments.show', $assignment->id) }}" class="btn btn-info btn-sm">View</a>
                                                @if(auth()->user()->role_name === 'Teachers' || auth()->user()->role_name === 'Super Admin')
                                                <a href="{{ route('assignments.edit', $assignment->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">Delete</button>
                                                </form>
                                            @endif
                                            
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{-- DataTables JS --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        $('#assignmentTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                ["5", "10", "25", "50", "All"]
            ],
            "language": {
                "lengthMenu": "Tampilkan _MENU_ halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Tidak ada data yang tersedia",
                "infoFiltered": "(disaring dari _MAX_ total entri)",
                "search": "Cari:",
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });

        var successMessage = '{{ Session::get('success') }}';
        var errorMessage = '{{ Session::get('error') }}';

        if (successMessage) {
            toastr.success(successMessage, 'Sukses');
        }
        if (errorMessage) {
            toastr.error(errorMessage, 'Error');
        }
    });
</script>

@endsection
