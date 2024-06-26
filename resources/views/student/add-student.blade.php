@extends('layouts.master')
@section('content')
<title>Tambah Siswa</title>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Tambah Siswa</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('student/add/page') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Tambah Siswa</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {{-- pesan --}}
        {!! Toastr::message() !!}
        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form action="{{ route('student/add/save') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">Informasi Siswa
                                        <span>
                                            <a href="javascript:;"><i class="feather-more-vertical"></i></a>
                                        </span>
                                    </h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama Depan <span class="login-danger">*</span></label>
                                        <input type="text" id="first-name-search" class="form-control" placeholder="Search Nama Depan">
                                        <select name="first_name" id="first-name-select" class="form-control @error('first_name') is-invalid @enderror">
                                            <option value="">Pilih Nama Depan</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->name }}" @if (old('first_name') == $user->name) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('first-name-search').addEventListener('input', function() {
                                        var searchValue = this.value.toLowerCase();
                                        var firstNameSelect = document.getElementById('first-name-select');
                                        var options = firstNameSelect.getElementsByTagName('option');
                                
                                        for (var i = 1; i < options.length; i++) { // start from 1 to skip the default option
                                            var optionText = options[i].text.toLowerCase();
                                            if (optionText.includes(searchValue)) {
                                                options[i].style.display = '';
                                            } else {
                                                options[i].style.display = 'none';
                                            }
                                        }
                                    });
                                </script>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama Belakang <span class="login-danger">*</span></label>
                                        <select name="last_name" class="form-control @error('last_name') is-invalid @enderror">
                                            <option value="">Pilih Nama Belakang</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->name }}" @if (old('last_name') == $user->name) selected @endif>{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Jenis Kelamin <span class="login-danger">*</span></label>
                                        <select class="form-control select  @error('gender') is-invalid @enderror"
                                            name="gender">
                                            <option selected disabled>Pilih Jenis Kelamin</option>
                                            <option value="Perempuan"
                                                {{ old('gender') == 'Perempuan' ? "selected" :"Perempuan"}}>Perempuan
                                            </option>
                                            <option value="Laki-laki"
                                                {{ old('gender') == 'Laki-laki' ? "selected" :""}}>Laki-laki</option>
                                        </select>
                                        @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Tanggal Lahir <span class="login-danger">*</span></label>
                                        <input
                                            class="form-control datetimepicker @error('date_of_birth') is-invalid @enderror"
                                            name="date_of_birth" type="text" placeholder="DD-MM-YYYY"
                                            value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nomor Induk </label>
                                        <input class="form-control @error('roll') is-invalid @enderror" type="text"
                                            name="roll" placeholder="Masukkan Nomor Induk" value="{{ old('roll') }}">
                                        @error('roll')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Golongan Darah <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('blood_group') is-invalid @enderror"
                                            name="blood_group">
                                            <option selected disabled>Silakan Pilih Golongan Darah</option>
                                            <option value="A+" {{ old('blood_group') == 'A+' ? "selected" :""}}>A+
                                            </option>
                                            <option value="B+" {{ old('blood_group') == 'B+' ? "selected" :""}}>B+
                                            </option>
                                            <option value="O+" {{ old('blood_group') == 'O+' ? "selected" :""}}>O+
                                            </option>
                                        </select>
                                        @error('blood_group')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Agama <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('religion') is-invalid @enderror" name="religion">
                                            <option selected disabled>Silakan Pilih Agama</option>
                                            <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Kristen" {{ old('religion') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                            <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                            <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                            <option value="Sikh" {{ old('religion') == 'Sikh' ? 'selected' : '' }}>Sikh</option>
                                            <option value="Yahudi" {{ old('religion') == 'Yahudi' ? 'selected' : '' }}>Yahudi</option>
                                            <option value="Lainnya" {{ old('religion') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                        </select>
                                        @error('religion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input type="text" id="email-search" class="form-control" placeholder="Search E-Mail">
                                        <select name="email" id="email-select" class="form-control @error('email') is-invalid @enderror">
                                            <option value="">Pilih E-Mail</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->email }}" @if (old('email') == $user->email) selected @endif>{{ $user->email }}</option>
                                            @endforeach
                                        </select>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <script>
                                    document.getElementById('email-search').addEventListener('input', function() {
                                        var searchValue = this.value.toLowerCase();
                                        var emailSelect = document.getElementById('email-select');
                                        var options = emailSelect.getElementsByTagName('option');
                                
                                        for (var i = 1; i < options.length; i++) { // start from 1 to skip the default option
                                            var optionText = options[i].text.toLowerCase();
                                            if (optionText.includes(searchValue)) {
                                                options[i].style.display = '';
                                            } else {
                                                options[i].style.display = 'none';
                                            }
                                        }
                                    });
                                </script>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Kelas <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('class') is-invalid @enderror"
                                            name="class">
                                            <option selected disabled>Silakan Pilih Kelas</option>
                                            <option value="12" {{ old('class') == '12' ? "selected" :""}}>12</option>
                                            <option value="11" {{ old('class') == '11' ? "selected" :""}}>11</option>
                                            <option value="10" {{ old('class') == '10' ? "selected" :""}}>10</option>
                                        </select>
                                        @error('class')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Bagian <span class="login-danger">*</span></label>
                                        <select class="form-control select @error('section') is-invalid @enderror"
                                            name="section">
                                            <option selected disabled>Silakan Pilih Bagian</option>
                                            <option value="A" {{ old('section') == 'A' ? "selected" :""}}>A</option>
                                            <option value="B" {{ old('section') == 'B' ? "selected" :""}}>B</option>
                                            <option value="C" {{ old('section') == 'C' ? "selected" :""}}>C</option>
                                        </select>
                                        @error('section')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>ID Pendaftaran </label>
                                        <input class="form-control @error('admission_id') is-invalid @enderror"
                                            type="text" name="admission_id" placeholder="Masukkan ID Pendaftaran"
                                            value="{{ old('admission_id') }}">
                                        @error('admission_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Telepon </label>
                                        <input class="form-control @error('phone_number') is-invalid @enderror"
                                            type="text"
                                            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1').replace(/^0[^.]/, '0');"
                                            name="phone_number" placeholder="Masukkan Nomor Telepon"
                                            value="{{ old('phone_number') }}">
                                        @error('phone_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nama Orang Tua <span class="login-danger">*</span></label>
                                        <input class="form-control @error('parent_name') is-invalid @enderror"
                                            type="text" name="parent_name" placeholder="Masukkan Nama Orang Tua"
                                            value="{{ old('parent_name') }}">
                                        @error('parent_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Alamat <span class="login-danger">*</span></label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text"
                                            name="address" placeholder="Masukkan Alamat" value="{{ old('address') }}">
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <label>Unggah Foto Siswa (150px X 150px)</label>
                                        <div class="uplod">
                                            <label
                                                class="file-upload image-upbtn mb-0 @error('upload') is-invalid @enderror">
                                                Pilih Berkas <input type="file" name="upload">
                                            </label>
                                            @error('upload')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
