@extends('layouts.master')

@section('content')
<title>Edit Ekstrakurikuler</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Edit Ekstrakurikuler</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('eskuls.update', $eskul->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <h5 class="form-title student-info">Informasi Ekstrakurikuler
                                    <span>
                                        <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                    </span>
                                </h5>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="nama_eskul" class="form-label">Nama Ekstrakurikuler <span
                                                class="login-danger">*</span></label>
                                        <input type="text" name="nama_eskul" id="nama_eskul" class="form-control"
                                            value="{{ $eskul->nama_eskul }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group local-forms">
                                        <label for="pembina" class="form-label">Nama Pembina <span
                                                class="login-danger">*</span></label>
                                        <input type="text" name="pembina" id="pembina" class="form-control"
                                            value="{{ $eskul->pembina }}" required>
                                    </div>
                                    <div class="form-group local-forms">
                                        <label for="waktu_eskul" class="form-label">Waktu Ekstrakurikulir <span
                                                class="login-danger">*</span></label>
                                        <input type="text" name="waktu_eskul" id="waktu_eskul" class="form-control"
                                            value="{{ $eskul->waktu_eskul }}" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengunggah tugas ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Unggah',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    });
</script>
