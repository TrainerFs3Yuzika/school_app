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
                <!-- Form Pencarian -->
                <div class="col-md-12 mb-3">
                    <form class="d-flex" role="search" method="GET" action="{{ route('pembelajaran_siswa.index') }}">
                        <input class="form-control me-2" type="search" name="search" placeholder="Cari pembelajaran..." aria-label="Search" value="{{ request()->get('search') }}">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="row">
            @foreach ($pembelajaranSiswa as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm border-light">
                        <!-- Card Image -->
                        <div class="card-body">
                            <!-- Card Title -->
                            <h5 class="card-title">{{ $item->subject->subject_name }}</h5>
                            <!-- Class Information -->
                            <p class="card-text">
                                <strong>Kelas:</strong> {{ $item->subject->class ?? 'Tidak Ada Kelas' }}
                            </p>
                            <!-- Teacher Information -->
                            <p class="card-text">
                                <strong>Guru:</strong> {{ $item->teacher->name }}
                            </p>
                            <!-- Materi File -->
                            <p class="card-text">
                                @if ($item->materi_file)
                                    <a href="{{ asset('storage/' . $item->materi_file) }}" target="_blank" class="btn btn-info btn-sm">
                                        <i class="fas fa-file-pdf"></i> Lihat Materi
                                    </a>
                                @else
                                    Tidak Ada File
                                @endif
                            </p>
                            
                            <!-- Additional Info -->
                            <p class="card-text">
                                <small class="text-muted">Tanggal Ditambahkan: {{ $item->created_at->format('d M Y') }}</small>
                            </p>
                            
                            <!-- Admin and Teacher Actions -->
                            @if(auth()->user()->role_name == 'Super Admin' || auth()->user()->role_name == 'Teachers')
                                <div class="text-center mt-3">
                                    <a href="{{ route('pembelajaran_siswa.edit', $item->id) }}" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Materi">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm student_delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{ $item->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Materi">
                                        <i class="fas fa-trash-alt"></i> Hapus
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
    </div>

    {{-- Modal hapus pembelajaran --}}
    <div class="modal custom-modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Hapus Pembelajaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus pembelajaran ini?</p>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" class="e_id" value="">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{-- Include DataTables JS --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });

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
