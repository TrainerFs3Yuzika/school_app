@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!} 
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Faktur</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dasbor</a></li>
                            <li class="breadcrumb-item"><a href="invoices.html">Faktur</a></li>
                            <li class="breadcrumb-item active">Faktur Dibayar</li>
                        </ul>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('invoice/paid/page') }}" class="invoices-links active">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('invoice/grid/page') }}" class="invoices-links">
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
                                            <p class="mb-0"><i class="fas fa-user-plus me-1 select-icon"></i> Pilih
                                                Pengguna</p>
                                            <span class="down-icon"><i class="fas fa-chevron-down"></i></span>
                                        </div>
                                        <div id="checkBoxes">
                                            <form action="#">
                                                <p class="checkbox-title">Pencarian Pelanggan</p>
                                                <div class="form-custom">
                                                    <input type="text" class="form-control bg-grey"
                                                        placeholder="Masukkan Nama Pelanggan">
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
                                                <p class="checkbox-title">Menurut Status</p>
                                                <div class="selectBox-cont">
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name">
                                                        <span class="checkmark"></span> Semua Faktur
                                                    </label>
                                                    <label class="custom_check w-100">
                                                        <input type="checkbox" name="name" checked>
                                                        <span class="checkmark"></span> Dibayar
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
                    <div class="invoices-main-tabs">
                        <div class="row align-items-center">
                            <div class="col-lg-8 col-md-8">
                                <div class="invoices-tabs">
                                    <ul>
                                        <li><a href="{{ route('invoice/list/page') }}">Semua Faktur</a></li>
                                        <li><a class="active" href="{{ route('invoice/paid/page') }}">Dibayar</a></li>
                                        <li><a href="{{ route('invoice/overdue/page') }}">Terlambat</a></li>
                                        <li><a href="{{ route('invoice/draft/page') }}">Draf</a></li>
                                        <li><a href="{{ route('invoice/recurring/page') }}">Berkala</a></li>
                                        <li><a href="{{ route('invoice/cancelled/page') }}">Dibatalkan</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="invoices-settings-btn">
                                    <a href="invoices-settings.html" class="invoices-settings-icon">
                                        <i class="feather feather-settings"></i>
                                    </a>
                                    <a href="{{ route('invoice/add/page') }}" class="btn">
                                        <i class="feather feather-plus-circle"></i> Faktur Baru
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ URL::to('assets/img/icons/invoices-icon1.svg') }}" alt="">
                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">$8,78,797</div>
                                </div>
                            </div>
                            <p class="inovices-all">Semua Faktur <span>50</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ URL::to('assets/img/icons/invoices-icon2.svg') }}" alt="">
                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">$4,5884</div>
                                </div>
                            </div>
                            <p class="inovices-all">Faktur Dibayar <span>60</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ URL::to('assets/img/icons/invoices-icon3.svg') }}" alt="">
                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">$2,05,545</div>
                                </div>
                            </div>
                            <p class="inovices-all">Faktur Belum Dibayar <span>70</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card inovices-card">
                        <div class="card-body">
                            <div class="inovices-widget-header">
                                <span class="inovices-widget-icon">
                                    <img src="{{ URL::to('assets/img/icons/invoices-icon4.svg') }}" alt="">
                                </span>
                                <div class="inovices-dash-count">
                                    <div class="inovices-amount">$8,8,797</div>
                                </div>
                            </div>
                            <p class="inovices-all">Faktur Dibatalkan <span>80</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-stripped table-hover datatable">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Nomor Faktur</th>
                                            <th>Dibuat pada</th>
                                            <th>Faktur ke</th>
                                            <th>Jumlah</th>
                                            <th>Dibayar pada</th>
                                            <th>Status</th>
                                            <th class="text-end">Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="invoice">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <a href="view-invoice.html" class="invoice-link">IN093439#@09</a>
                                            </td>
                                            <td>16 Mar 2022</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html">
                                                        <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt=""> Barbara Moore
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-primary">$1,54,220</td>
                                            <td>23 Mar 2022</td>
                                            <td><span class="badge bg-success-light">Dibayar</span></td>
                                            <td class="text-end">
                                                <a href="edit-invoice.html" class="btn btn-sm btn-white text-success me-2">
                                                    <i class="far fa-edit me-1"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-white text-danger" href="#" data-bs-toggle="modal" data-bs-target="#delete_paid">
                                                    <i class="far fa-trash-alt me-1"></i>Hapus
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label class="custom_check">
                                                    <input type="checkbox" name="invoice">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <a href="view-invoice.html" class="invoice-link">IN093439#@09</a>
                                            </td>
                                            <td>16 Mar 2022</td>
                                            <td>
                                                <h2 class="table-avatar">
                                                    <a href="profile.html">
                                                        <img class="avatar avatar-sm me-2 avatar-img rounded-circle" src="{{ URL::to('/images/photo_defaults.jpg') }}" alt=""> Barbara Moore
                                                    </a>
                                                </h2>
                                            </td>
                                            <td class="text-primary">$1,54,220</td>
                                            <td>23 Mar 2022</td>
                                            <td><span class="badge bg-success-light">Dibayar</span></td>
                                            <td class="text-end">
                                                <a href="edit-invoice.html" class="btn btn-sm btn-white text-success me-2">
                                                    <i class="far fa-edit me-1"></i> Edit
                                                </a>
                                                <a class="btn btn-sm btn-white text-danger" href="#" data-bs-toggle="modal" data-bs-target="#delete_paid">
                                                    <i class="far fa-trash-alt me-1"></i>Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
