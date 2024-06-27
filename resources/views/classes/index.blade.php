@extends('layouts.master')

@section('content')
<title>Daftar Kelas</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Kelas</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Kelas</li>
                            <li class="breadcrumb-item active">Semua Kelas</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="class-group-form">
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
                                    <h3 class="page-title">Daftar Kelas</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('classes.create') }}" class="btn btn-primary">Tambah Kelas <i class="fas fa-plus"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        @if ($classes->count() > 0)
                            <div class="table-responsive">
                                <table id="classTable" class="table border-0 star-class table-hover table-center mb-0 table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Nama Jurusan</th>
                                            <th scope="col">Nama Guru</th>
                                            <th scope="col">Kelas</th>
                                            @if (auth()->user()->role_name === 'Super Admin')
                                            <th scope="col">Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($classes as $class)
                                            <tr>
                                                <td>{{ $class->id }}</td>
                                                <td>{{ $class->class_name }}</td>
                                                <td>{{ $class->teacher->full_name }}</td>
                                                <td>{{ $class->subject->subject_name }}</td>
                                                @if (auth()->user()->role_name === 'Super Admin')
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm bg-danger-light">
                                                            <i class="far fa-edit me-2"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('classes.destroy', $class->id) }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
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
                        @else
                            <p>Tidak ada kelas yang tersedia.</p>
                        @endif
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
        $('#classTable').DataTable({
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
