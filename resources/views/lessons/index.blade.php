@extends('layouts.master')

@section('content')
<title>Daftar Jadwal</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Jadwal</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Jadwal</li>
                            <li class="breadcrumb-item active">Semua Jadwal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="book-group-form">
            <div class="row">
                <!-- Search form -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Jadwal</h3>
                                </div>
                                @if(auth()->user()->role_name === 'Super Admin')
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('lessons.create') }}" class="btn btn-primary">Tambah Jadwal <i class="fas fa-plus"></i></a>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="lessonsTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Pelajaran</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Guru</th>
                                        <th scope="col">Siswa</th>
                                        @if(auth()->user()->role_name === 'Super Admin')
                                        <th scope="col">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lessons as $key => $lesson)
                                        <tr>
                                            <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                            <td>{{ $lesson->id }}</td>
                                            <td>{{ $lesson->subject->subject_name }}</td>
                                            <td>{{ $lesson->class }}</td>
                                            <td>{{ $lesson->class_type }}</td>
                                            <td>{{ $lesson->days }}</td>
                                            <td>{{ $lesson->time_start }} - {{ $lesson->time_end }}</td>
                                            <td>{{ $lesson->teacher->full_name }}</td>
                                            <td>
                                                @foreach ($lesson->students as $student)
                                                    {{ $student->first_name }}@if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            @if(auth()->user()->role_name === 'Super Admin')
                                            <td>
                                                <div class="actions">
                                                    <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm bg-warning-light">
                                                        <i class="far fa-edit me-2"></i>
                                                    </a>
                                                    <form action="{{ route('lessons.destroy', $lesson->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                                            <i class="far fa-trash-alt me-2"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            @endif
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
        $('#lessonsTable').DataTable({
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
