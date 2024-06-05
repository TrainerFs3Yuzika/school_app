@extends('layouts.master')

@section('content')
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
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <!-- Buttons -->
                                    <a href="#" class="btn btn-outline-gray me-2 active">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-gray me-2">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Unduh</a>
                                    <a href="{{ route('lessons.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="bookTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Mata Pelajaran</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Hari</th>
                                        <th scope="col">Jam Mulai</th>
                                        <th scope="col">Jam Berakhir</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="">
                                    @foreach ($lessons as $key => $lesson)
                                    <tr>
                                        <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                        <td>{{ $lesson->id }}</td>
                                        <td>{{ $lesson->subject->subject_name }}</td> <!-- Judul -->
                                        <td>{{ $lesson->class }}</td> <!-- Penulis -->
                                        <td>{{ $lesson->days }}</td> <!-- Penerbit -->
                                        <td>{{ $lesson->time_start }}</td> <!-- Tahun Terbit -->
                                        <td>{{ $lesson->time_end }}</td> <!-- Genre -->
                                        <td>
                                            <div class="actions">
                                                <a href="{{ route('lessons.edit', $lesson->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="far fa-edit me-2"></i>
                                                </a>
                                                <form method="POST" action="{{ route('lessons.destroy', $lesson->id) }}" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm bg-danger-light"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                        <i class="far fa-trash-alt me-2"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td> <!-- Aksi -->
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
</div>

<!-- DataTables CSS and JS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#bookTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            }
        });
    });
</script>
@endsection
