@extends('layouts.master')

@section('content')
<title>Daftar Dokumentasi Kegiatan Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Dokumentasi Kegiatan Siswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Dokumentasi Kegiatan Siswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        {{-- pesan --}}
        {!! Toastr::message() !!}
        
        <div class="student-group-form">
            <div class="row">
                <!-- Search form (optional) -->
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Dokumentasi</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('dokumentasi_kegiatan.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Dokumentasi</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table id="dokumentasiTable" class="table border-0 star-student table-hover table-center mb-0 table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dokumentasi as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->judul }}</td>
                                            <td>
                                                <img src="{{ asset('storage/gambar_dokumentasi/' . $item->gambar) }}" alt="{{ $item->judul }}" width="100">
                                            </td>
                                            <td>{{ $item->deskripsi }}</td>
                                            <td class="text-center align-middle">
                                                <a href="{{ route('dokumentasi_kegiatan.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                                <a href="{{ route('dokumentasi_kegiatan.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                                <form action="{{ route('dokumentasi_kegiatan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                </form>
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
</div>

@section('script')
{{-- Include DataTables JS --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dokumentasiTable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "lengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "pageLength": 5
        });

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
@endsection
