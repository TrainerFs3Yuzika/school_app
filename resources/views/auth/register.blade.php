@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Registrasi</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item">Akun</li>
                                <li class="breadcrumb-item active">From Registrasi</li>
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
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <h5 class="form-title student-info">Informasi Registrasi
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="name">Nama Lengkap <span class="login-danger">*</span></label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap" value="{{ old('name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="email">Email <span class="login-danger">*</span></label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="role_name">Role Name <span class="login-danger">*</span></label>
                                            <select name="role_name" id="role_name" class="form-control select @error('role_name') is-invalid @enderror" placeholder="Pilih Role">
                                                <option selected disabled>Pilih Role</option>
                                                @foreach ($role as $name)
                                                    <option value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                                                @endforeach
                                            </select>
                                            @error('role_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group local-forms">
                                            <label for="password">Password <span class="login-danger">*</span></label>
                                            <input type="password" name="password" class="form-control pass-input @error('password') is-invalid @enderror" placeholder="Password">
                                            <span class="profile-views feather-eye toggle-password"></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group local-forms">
                                            <label for="password_confirmation">Konfirmasi Password <span class="login-danger">*</span></label>
                                            <input type="password" name="password_confirmation" class="form-control pass-confirm @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password">
                                            <span class="profile-views feather-eye reg-toggle-password"></span>
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
                                <button type="reset" class="btn btn-warning mt-3">Reset</button>
                            </form>
                            
                            <div class="login-or mt-3">
                                <span class="or-line"></span>
                                <span class="span-or">atau</span>
                            </div>
                            <div class="social-login mt-3">
                                <a href="#" class="bg-purple text-white"><i class="fab fa-google-plus-g"></i></a>
                                <a href="#" class="bg-purple text-white"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="bg-purple"><i class="fab fa-twitter text-white"></i></a>
                                <a href="#" class="bg-purple"><i class="fab fa-linkedin-in text-white"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
