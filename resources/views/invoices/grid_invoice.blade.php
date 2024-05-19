@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Grid Tagihan</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dasbor</a></li>
                            <li class="breadcrumb-item active">Grid Tagihan</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col"></div>
                    <div class="col-auto">
                        <a href="{{ route('invoice/list/page') }}" class="invoices-links">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('invoice/grid/page') }}" class="invoices-links active">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="card report-card">
                <div class="card-body pb-0">
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="app-listing">
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0">
                                                <i class="fas fa-user-plus me-1 select-icon"></i> Pilih Pengguna
                                            </p>
                                            <span class="down-icon">
                                                <i class="fas fa-chevron-down"></i>
                                            </span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Pencarian Pelanggan</p>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control bg-grey" placeholder="Masukkan Nama Pelanggan">
                                                </div>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Brian Johnson
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Russell Copeland
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Greg Lynch
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> John Blair
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Barbara Moore
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Hendry Evan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="username">
                                                        <span class="checkmark"></span> Richard Miles
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Terapkan</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-calendar me-1 select-icon"></i> Pilih
                                                Tanggal</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Filter Tanggal</p>
                                                <div class="selectBox-cont selectBox-cont-one h-auto">
                                                    <div class="date-picker">
                                                        <div class="form-custom cal-icon">
                                                            <input class="form-control datetimepicker" type="text"
                                                                placeholder="Dari">
                                                        </div>
                                                    </div>
                                                    <div class="date-picker pe-0">
                                                        <div class="form-custom cal-icon">
                                                            <input class="form-control datetimepicker" type="text"
                                                                placeholder="Ke">
                                                        </div>
                                                    </div>
                                                    <div class="date-list">
                                                        <ul>
                                                            <li><a href="#" class="btn date-btn">Hari Ini</a></li>
                                                            <li><a href="#" class="btn date-btn">Kemarin</a></li>
                                                            <li><a href="#" class="btn date-btn">7 Hari Terakhir</a>
                                                            </li>
                                                            <li><a href="#" class="btn date-btn">Bulan Ini</a></li>
                                                            <li><a href="#" class="btn date-btn">Bulan Lalu</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-book-open me-1 select-icon"></i> Pilih
                                                Status</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Berdasarkan Status</p>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name" checked>
                                                        <span class="checkmark"></span> Semua Tagihan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Lunas
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Terlambat
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Draf
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Berkala
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Dibatalkan
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Terapkan</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="multipleSelection">
                                        <div class="selectBox">
                                            <p class="mb-0"><i class="fas fa-bookmark me-1 select-icon"></i> Berdasarkan
                                                Kategori</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Kategori</p>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control bg-grey"
                                                        placeholder="Masukkan Nama Kategori">
                                                </div>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Periklanan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Makanan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Pemasaran
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Perbaikan
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Perangkat Lunak
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Alat Tulis
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="category">
                                                        <span class="checkmark"></span> Perjalanan
                                                    </label>
                                                </div>
                                                <button type="submit" class="btn w-100 btn-primary">Terapkan</button>
                                                <button type="reset" class="btn w-100 btn-grey">Reset</button>
                                            </form>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="report-btn">
                                        <a href="#" class="btn">
                                            <img src="assets/img/icons/invoices-icon5.png" alt="" class="me-2">
                                            Buat laporan
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card invoices-tabs-card border-0">
                <div class="card-body card-body pt-0 pb-0">
                    <div class="invoices-main-tabs border-0 pb-0">
                        <div class="row align-items-center">
                            <div class="col-lg-12 col-md-12">
                                <div class="invoices-settings-btn invoices-settings-btn-one">
                                    <a href="invoices-settings.html" class="invoices-settings-icon">
                                        <i class="feather feather-settings"></i>
                                    </a>
                                    <a href="{{ route('invoice/add/page') }}" class="btn">
                                        <i class="feather feather-plus-circle"></i> Tagihan Baru
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                @foreach($invoiceList as $key => $value)
                    <div class="col-sm-6 col-lg-4 col-xl-3 d-flex">
                        <div class="card invoices-grid-card w-100">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <a href="{{ url('invoice/edit/'.$value->invoice_id) }}" class="invoice-grid-link">{{ $value->invoice_id }}</a>
                                <div class="dropdown dropdown-action">
                                    <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="edit-invoice.html">
                                            <i class="far fa-edit me-2"></i>Ubah
                                        </a>
                                        <a class="dropdown-item" href="{{ url('invoice/view/'.$value->invoice_id) }}">
                                            <i class="far fa-eye me-2"></i>Lihat Detail
                                        </a>
                                        <a class="dropdown-item" href="javascript:void(0);">
                                            <i class="far fa-trash-alt me-2"></i>Hapus
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-middle">
                                <h2 class="card-middle-avatar">
                                    <a href="profile.html">
                                        <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt="Gambar Pengguna"> {{ $value->customer_name }}
                                    </a>
                                </h2>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <span><i class="far fa-money-bill-alt"></i> Jumlah</span>
                                        <h6 class="mb-0">${{ $value->total_amount }}</h6>
                                    </div>
                                    <div class="col-auto">
                                        <span><i class="far fa-calendar-alt"></i> Tanggal Jatuh Tempo</span>
                                        <h6 class="mb-0">{{ \Carbon\Carbon::parse($value->due_date)->format('d M Y') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <span class="badge bg-success-dark">Lunas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                @endforeach
            
                <div class="col-lg-12">
                    <div class="invoice-load-btn">
                        <a href="#" class="btn">
                            <span class="spinner-border text-primary"></span> Muat lebih banyak
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
