@extends('layouts.master')

@section('content')
<title>Daftar Tagihan</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Daftar Tagihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Tagihan</li>
                            <li class="breadcrumb-item active">Semua Tagihan</li>
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
                                    <h3 class="page-title">Daftar Tagihan</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Staff_perpus')
                                        <a href="{{ route('tagihan.create') }}" class="btn btn-primary">Buat Tagihan Baru <i class="fas fa-plus"></i></a>
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="tagihanTable" class="table border-0 star-book table-hover table-center mb-0 table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Nama Peminjam</th>
                                        <th scope="col">Jumlah Denda</th>
                                        <th scope="col">Status Lunas</th>
                                        @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Staff_perpus')
                                            <th scope="col">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tagihan as $key => $item)
                                        <tr>
                                            <td>{{ ++$key }}</td> <!-- Nomor urut -->
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->peminjaman->user->name ?? 'Unknown' }}</td><!-- Nama Peminjam -->
                                            <td>{{ $item->jumlah_denda }}</td> <!-- Jumlah Denda -->
                                            <td>{{ $item->lunas ? 'Lunas' : 'Belum Lunas' }}</td> <!-- Status Lunas -->
                                            @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Staff_perpus')
                                                <td>
                                                    <div class="actions">
                                                        <a href="{{ route('tagihan.show', $item->id) }}" class="btn btn-sm bg-info-light">
                                                            <i class="far fa-eye me-2"></i>
                                                        </a>
                                                        <a href="{{ route('tagihan.edit', $item->id) }}" class="btn btn-sm bg-warning-light">
                                                            <i class="far fa-edit me-2"></i>
                                                        </a>
                                                        <form action="{{ route('tagihan.destroy', $item->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus tagihan ini?')">
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
        $('#tagihanTable').DataTable({
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
