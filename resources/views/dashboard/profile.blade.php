@extends('layouts.master')
@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Profil</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dasbord</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="profile-header">
                    <div class="row align-items-center">
                        <div class="col-auto profile-image">
                            <a href="#">
                                <img class="rounded-circle" alt="{{ Session::get('name') }}" src="/images/{{ Session::get('avatar') }}">
                            </a>
                        </div>
                        <div class="col ms-md-n2 profile-user-info">
                            <h4 class="user-name mb-0">{{ Session::get('name') }}</h4>
                            <h6 class="text-muted">{{ Session::get('position') }}</h6>
                        
                        </div>
                    </div>
                </div>
                <div class="profile-menu">
                    <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Tentang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Kata Sandi</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content profile-tab-cont">

                    <div class="tab-pane fade show active" id="per_details_tab">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Detail Personal</span>
                                            <a class="edit-link" data-bs-toggle="modal"
                                                href="#edit_personal_details"><i
                                                    class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nama</p>
                                            <p class="col-sm-9">{{ Session::get('name') }}</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Tanggal Lahir</p>
                                            <p class="col-sm-9">24 Jul 1983</p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Email</p>
                                            <p class="col-sm-9"><a href="/cdn-cgi/l/email-protection"
                                                    class="__cf_email__"
                                                    data-cfemail="a1cbcec9cfc5cec4e1c4d9c0ccd1cdc48fc2cecc">{{ Session::get('email') }}</a>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <p class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3">Nomor Telepon</p>
                                            <p class="col-sm-9">{{ Session::get('phone_number') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span>Status Akun</span>
                                            <a class="edit-link" href="#"><i class="far fa-edit me-1"></i>Edit</a>
                                        </h5>
                                        <button class="btn btn-success" type="button"><i class="fe fe-check-verified"></i> {{ Session::get('status') }}</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="password_tab" class="tab-pane fade">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Ubah Kata Sandi</h5>
                                <div class="row">
                                    <div class="col-md-10 col-lg-6">
                                        <form action="{{ route('change/password') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Kata Sandi Lama</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" value="{{ old('current_password') }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <input type="checkbox" id="show_current_password"> Show
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('current_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Kata Sandi Baru</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="{{ old('new_password') }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <input type="checkbox" id="show_new_password"> Show
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('new_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Konfirmasi Kata Sandi</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control @error('new_confirm_password') is-invalid @enderror" name="new_confirm_password" value="{{ old('new_confirm_password') }}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">
                                                            <input type="checkbox" id="show_confirm_password"> Show
                                                        </span>
                                                    </div>
                                                </div>
                                                @error('new_confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <script>
                        // JavaScript untuk toggle show/hide password
                        document.getElementById('show_current_password').addEventListener('change', function() {
                            togglePasswordVisibility('current_password');
                        });
                    
                        document.getElementById('show_new_password').addEventListener('change', function() {
                            togglePasswordVisibility('new_password');
                        });
                    
                        document.getElementById('show_confirm_password').addEventListener('change', function() {
                            togglePasswordVisibility('new_confirm_password');
                        });
                    
                        function togglePasswordVisibility(inputId) {
                            const passwordInput = document.getElementsByName(inputId)[0];
                            if (passwordInput.type === 'password') {
                                passwordInput.type = 'text';
                            } else {
                                passwordInput.type = 'password';
                            }
                        }
                    </script>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
