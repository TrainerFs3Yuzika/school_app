@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Tambah Kontak Baru</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Kontak</li>
                                <li class="breadcrumb-item active">Tambah Kontak Baru</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('contact_information.store') }}" method="POST" onsubmit="return confirmAdd()">
                                @csrf
                                <div class="row">
                                    <h5 class="form-title student-info">Informasi Kontak
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="name">Nama <span class="login-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="Nama"
                                                value="{{ old('name') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="email">Email <span class="login-danger">*</span></label>
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                value="{{ old('email') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="phone_number">Nomor Telepon <span
                                                    class="login-danger">*</span></label>
                                            <input type="text" name="phone_number" class="form-control"
                                                placeholder="Nomor Telepon" value="{{ old('phone_number') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="address">Alamat <span class="login-danger">*</span></label>
                                            <textarea name="address" class="form-control" placeholder="Alamat">{{ old('address') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="twitter">Twitter <span class="login-danger">*</span></label>
                                            <input type="text" name="twitter" class="form-control" placeholder="Twitter"
                                                value="{{ old('twitter') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="facebook">Facebook <span class="login-danger">*</span></label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="Facebook" value="{{ old('facebook') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="instagram">Instagram <span class="login-danger">*</span></label>
                                            <input type="text" name="instagram" class="form-control"
                                                placeholder="Instagram" value="{{ old('instagram') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="github">GitHub <span class="login-danger">*</span></label>
                                            <input type="text" name="github" class="form-control" placeholder="GitHub"
                                                value="{{ old('github') }}">
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="whatsapp">WhatsApp <span class="login-danger">*</span></label>
                                            <input type="text" name="whatsapp" class="form-control"
                                                placeholder="WhatsApp" value="{{ old('whatsapp') }}">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                                <a href="{{ route('contact_information.index') }}" class="btn btn-secondary mt-3">Kembali</a>
                                <button type="reset" class="btn btn-warning mt-3">Reset</button>
                            </form>
                        </div>
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
                text: 'Apakah Anda yakin ingin menambahkan kontak ini?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Tambahkan',
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
