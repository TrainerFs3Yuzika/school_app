@extends('layouts.master')
@section('content')
{{-- pesan --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Daftar Departemen</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dasbor</a></li>
                        <li class="breadcrumb-item active">Departemen</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="student-group-form">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="department_id" placeholder="Cari berdasarkan ID ...">
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control" id="department_name" placeholder="Cari berdasarkan Nama ...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class="form-control"  placeholder="Cari berdasarkan Tahun ...">
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="search-student-btn">
                        <button type="btn" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">

                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Departemen</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="#" class="btn btn-outline-primary me-2">
                                        <i class="fas fa-download"></i> Unduh
                                    </a>
                                    <a href="{{ route('department/add/page') }}" class="btn btn-primary">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <table class="table table-stripped table table-hover table-center mb-0" id="dataList">
                            <thead class="student-thread">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Kepala Departemen</th>
                                    <th>Tahun Mulai</th>
                                    <th>Jumlah Mahasiswa</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- model hapus --}}
<div class="modal custom-modal fade" id="delete" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Hapus Departemen</h3>
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-btn delete-action">
                    <div class="row">
                        <form action="{{ route('department/delete') }}" method="POST">
                            @csrf
                            <input type="hidden" name="department_id" class="e_department_id" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary paid-continue-btn" style="width: 100%;">Hapus</button>
                                </div>
                                <div class="col-6">
                                    <a data-bs-dismiss="modal"
                                        class="btn btn-primary paid-cancel-btn">Batal
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    {{-- dapatkan semua data js --}}
    <script type="text/javascript">
        $(document).ready(function() {
        $('#dataList').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                searching: true,
                ajax: {
                    url:"{{ route('get-data-list') }}",
                },
                columns: [
                    {
                        data: 'department_id',
                        name: 'department_id',
                    },
                    {
                        data: 'department_name',
                        name: 'department_name',
                    },
                    {
                        data: 'head_of_department',
                        name: 'head_of_department',
                    },
                    {
                        data: 'department_start_date',
                        name: 'department_start_date',
                    },
                    {
                        data: 'no_of_students',
                        name: 'no_of_students',
                    },
                    {
                        data: 'modify',
                        name: 'modify',
                    },
                ]
            });
        });
    </script>

    {{-- hapus js --}}
<script>
    $(document).on('click','.delete',function()
    {
        var _this = $(this).parents('tr');
        $('.e_department_id').val(_this.find('.department_id').data('department_id'));
    });
</script>
@endsection
@endsection
