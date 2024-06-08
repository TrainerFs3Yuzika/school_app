@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Eskul</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('eskuls.create') }}" class="btn btn-primary mb-2">Tambah Eskul</a>
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table datatable" id="eskulsTable">
                                <thead>
                                    <tr>
                                        <th>Nama Eskul</th>
                                        <th>Pembina</th>
                                        <th>Waktu Eskul</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($eskuls as $eskul)
                                    <tr>
                                        <td>{{ $eskul->nama_eskul }}</td>
                                        <td>{{ $eskul->pembina }}</td>
                                        <td>{{ $eskul->waktu_eskul }}</td>
                                        <td>
                                            <a href="{{ route('eskuls.show', $eskul->id) }}" class="btn btn-info">Detail</a>
                                            <a href="{{ route('eskuls.edit', $eskul->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('eskuls.destroy', $eskul->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus eskul ini?')">Hapus</button>
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
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#eskulsTable').DataTable({
            "pageLength": 5, // Menampilkan hanya lima data per halaman
            "searching": true // Mengaktifkan fungsi pencarian
        });
    });
</script>
@endsection
