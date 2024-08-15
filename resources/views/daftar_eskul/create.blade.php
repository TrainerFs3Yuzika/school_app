@extends('layouts.master')

@section('content')
<title>Pendaftaran Eskul</title>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Pendaftaran Eskul</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">Eskul</li>
                            <li class="breadcrumb-item active">Pendaftaran Eskul</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-form comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('daftar-eskul.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="eskul_id">Pilih Eskul:</label>
                                <select id="eskul_id" name="eskul_id" class="form-control select2" required>
                                    @foreach ($eskuls as $eskul)
                                        <option value="{{ $eskul->id }}">{{ $eskul->nama_eskul }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="user_name">Nama Siswa:</label>
                                <input type="text" id="user_name" name="user_name" class="form-control" value="{{ $user->name }}" readonly>
                                <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Select2 CSS and JS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/js/select2.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Select2 for eskul selection
        $('#eskul_id').select2({
            width: '100%' // Adjust width to match container
        });

        // Confirm before submitting form
        document.querySelector('form').addEventListener('submit', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mendaftar eskul ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Daftar',
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
@endsection
