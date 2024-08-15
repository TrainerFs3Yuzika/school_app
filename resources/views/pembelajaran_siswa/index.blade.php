@extends('layouts.master')

@section('content')
<title>Daftar Pembelajaran Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Pembelajaran Siswa</h3>
                        @if(auth()->user()->role_name == 'Super Admin' || auth()->user()->role_name == 'Teachers')
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('pembelajaran_siswa.index') }}">Pembelajaran Siswa</a></li>
                                <li class="breadcrumb-item active">Daftar Pembelajaran</li>
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="student-group-form">
            <div class="row">
                <!-- Search form, jika diperlukan -->
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table comman-shadow">
                    <div class="card-body">
                        <div class="page-header">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="page-title">Daftar Pembelajaran Siswa</h3>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="{{ route('pembelajaran_siswa.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Pembelajaran</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            @foreach ($pembelajaranSiswa as $item)
                                <div class="col-md-4">
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $item->subject->subject_name }}</h5>
                                            <p class="card-text">Kelas: {{ $item->subject->class ?? 'Tidak Ada Kelas' }}</p>
                                            {{-- <p class="card-text">Siswa: {{ $item->student->name }}</p> --}}
                                            <p class="card-text">Guru: {{ $item->teacher->name }}</p>
                                            <p class="card-text">
                                                @if ($item->materi_file)
                                                    <a href="{{ asset('storage/' . $item->materi_file) }}" target="_blank">Lihat Materi</a>
                                                @else
                                                    Tidak Ada File
                                                @endif
                                            </p>
                                            @if(auth()->user()->role_name == 'Super Admin' || auth()->user()->role_name == 'Teachers')
                                                <div class="text-center">
                                                    <a href="{{ route('pembelajaran_siswa.edit', $item->id) }}" class="btn btn-sm bg-warning-light me-2">
                                                        <i class="far fa-edit me-2"></i> Edit
                                                    </a>
                                                    <button type="button" class="btn btn-sm bg-danger-light student_delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $item->id }}">
                                                        <i class="far fa-trash-alt py-1"></i> Delete
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- Modal hapus pembelajaran --}}
<div class="modal custom-modal fade" id="deleteModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-header">
                    <h3>Hapus Pembelajaran</h3>
                    <p>Apakah Anda yakin ingin menghapus?</p>
                </div>
                <div class="modal-btn delete-action">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" class="e_id" value="">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary continue-btn submit-btn" style="border-radius: 5px !important;">Hapus</button>
                            </div>
                            <div class="col-6">
                                <a href="#" data-bs-dismiss="modal" class="btn btn-primary paid-cancel-btn">Batal</a>
                            </div>
                        </div>
                    </form>
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
        $(document).on('click', '.student_delete', function() {
            var pembelajaranId = $(this).data('id');
            var url = '{{ route('pembelajaran_siswa.destroy', ':id') }}';
            url = url.replace(':id', pembelajaranId);
            $('#deleteForm').attr('action', url);
        });

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
@endsection
