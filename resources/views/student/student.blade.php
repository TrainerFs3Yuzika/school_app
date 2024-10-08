@extends('layouts.master')
@section('content')
<title>Daftar Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Siswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student/list') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Semua Siswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="student-group-form">
            <div class="row">
                <!-- Search form -->
                <div class="col-md-4">
                    <form action="{{ route('studentlist') }}" method="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari Siswa..." value="{{ request()->get('search') }}">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <h1>
                    
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Siswa</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('student/list') }}" class="btn btn-outline-gray me-2 active">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('student/grid') }}" class="btn btn-outline-gray me-2">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </a>
                                    @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('student/add/page') }}" class="btn btn-primary">Tambah Siswa <i class="fas fa-plus"></i></a>
                                    @endif                                    
                                    {{-- @if (auth()->user()->role_name === 'Super Admin')
                                    <a href="{{ route('export-pdf') }}" class="btn btn-primary">Export PDF <i class="fas fa-file-pdf"></i></a>
                                @endif                                 --}}
                                
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="studentList" class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Nama Orang Tua</th>
                                        <th>Nomor Ponsel</th>
                                        <th>Alamat</th>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <th class="text-end">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studentList as $key => $list)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td>STD{{ ++$key }}</td>
                                        <td hidden class="id">{{ $list->id }}</td>
                                        <td hidden class="avatar">{{ $list->upload }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="student-details.html" class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle" src="{{ Storage::url('student-photos/'.$list->upload) }}" alt="Gambar Pengguna">
                                                </a>
                                                <a href="student-details.html">{{ $list->first_name }} {{ $list->last_name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $list->class }} {{ $list->section }}</td>
                                        <td>{{ $list->date_of_birth }}</td>
                                        <td>{{ $list->parent_name }}</td>
                                        <td>{{ $list->phone_number }}</td>
                                        <td>{{ $list->address }}</td>
                                        @if (auth()->user()->role_name === 'Super Admin')
                                        <td class="text-end">
                                            <div class="actions">
                                                <a href="{{ url('student/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                    <i class="far fa-edit me-2"></i>
                                                </a>
                                                <a class="btn btn-sm bg-danger-light student_delete" data-bs-toggle="modal" data-bs-target="#studentUser">
                                                    <i class="far fa-trash-alt me-2"></i>
                                                </a>
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
</div>

{{-- model hapus siswa --}}
<div class="modal custom-modal fade" id="studentUser" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Hapus Siswa</h3>
                        <p>Apakah Anda yakin ingin menghapus?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form action="{{ route('student/delete') }}" method="POST">
                            @csrf
                            <div class="row">
                                <input type="hidden" name="id" class="e_id" value="">
                                <input type="hidden" name="avatar" class="e_avatar" value="">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn" style="border-radius: 5px !important;">Hapus</button>
                                </div>
                                <div class="col-6">
                                    <a href="#" data-bs-dismiss="modal"class="btn btn-primary paid-cancel-btn">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')

    {{-- js hapus --}}
    <script>
        $(document).on('click','.student_delete',function()
        {
            var _this = $(this).parents('tr');
            $('.e_id').val(_this.find('.id').text());
            $('.e_avatar').val(_this.find('.avatar').text());
        });
    </script>
    @endsection

@endsection