@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Pengaturan Faktur</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dasbor</a>
                            </li>
                            <li class="breadcrumb-item active">Pengaturan Umum</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <div class="widget settings-menu">
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('setting/page') }}" class="nav-link active">
                                    <i class="fe fe-git-commit"></i> <span>Pengaturan Umum</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('invoice/settings/tax/page') }}" class="nav-link">
                                    <i class="fe fe-bookmark"></i> <span>Pengaturan Pajak</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('invoice/settings/bank/page') }}" class="nav-link">
                                    <i class="fas fa-university"></i> <span>Pengaturan Bank</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="card invoices-settings-card">
                        <div class="card-header">
                            <h5 class="card-title">Pengaturan Umum</h5>
                        </div>
                        <div class="card-body">

                            <form action="#" class="invoices-settings-form">
                                <div class="row align-items-center form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">Status Faktur</label>
                                    <div class="col-sm-9">
                                        <label class="custom_check">
                                            <input type="checkbox" name="invoice">
                                            <span class="checkmark"></span> Ubah status faktur menjadi lunas setelah pesanan selesai
                                        </label>
                                    </div>
                                </div>
                                <div class="row align-items-center form-group">
                                    <label for="email" class="col-sm-3 col-form-label input-label">Jumlah Faktur</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center form-group">
                                    <label for="phone" class="col-sm-3 col-form-label input-label">Nomor Faktur dimulai dengan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="$" value="$">
                                    </div>
                                </div>
                                <div class="row align-items-center form-group">
                                    <label for="addressline1"
                                        class="col-sm-3 col-form-label input-label">Awalan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center form-group">
                                    <label for="addressline2" class="col-sm-3 col-form-label input-label">Reset Nomor</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center form-group">
                                    <label for="zipcode" class="col-sm-3 col-form-label input-label">Waktu Jatuh Tempo Default</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row align-items-center form-group ">
                                    <label for="zipcode" class="col-sm-3 col-form-label input-label">Penandatangan Digital Default</label>
                                    <div class="col-sm-9">
                                        <div class="invoices-upload-btn">
                                            <input type="file" accept="image/*" name="image" id="file"
                                                onchange="loadFile(event)" class="hide-input">
                                            <label for="file" class="upload">
                                                Unggah Berkas
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center form-group">
                                    <label for="zipcode" class="col-sm-3 col-form-label input-label">Nama Digital Default</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="invoice-setting-btn text-end">
                                    <button type="submit" class="btn cancel-btn me-2">Batal</button>
                                    <button type="submit" class="btn btn-primary-save-bg">Simpan Perubahan</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
