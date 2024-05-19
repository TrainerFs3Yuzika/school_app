@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!}
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card invoice-info-card">
                        <div class="card-body">
                            <div class="invoice-item invoice-item-one">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-logo">
                                            <img src="{{ URL::to('assets/img/logo.png') }}" alt="logo">
                                        </div>
                                        <div class="invoice-head">
                                            <h2>Faktur</h2>
                                            <p>Nomor Faktur : {{ $invoiceView->invoice_id }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invoice-info">
                                            <strong class="customer-text-one">Faktur Dari</strong>
                                            <h6 class="invoice-name">Nama Perusahaan</h6>
                                            <p class="invoice-details">
                                                {!! nl2br(($invoiceView->invoice_to)) !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="invoice-item invoice-item-two">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="invoice-info">
                                            <strong class="customer-text-one">Ditagih ke</strong>
                                            <h6 class="invoice-name"></h6>
                                            <p class="invoice-details invoice-details-two">
                                                {!! nl2br(($invoiceView->invoice_from)) !!}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="invoice-info invoice-info2">
                                            <strong class="customer-text-one">Detail Pembayaran</strong>
                                            <p class="invoice-details">
                                                Kartu Debit <br>
                                                XXXXXXXXXXXX-{{ $invoiceView->account_number }} <br>
                                                {{  $invoiceView->bank_name }}
                                            </p>
                                            <div class="invoice-item-box">
                                                <p>Berulang : 15 Bulan</p>
                                                <p class="mb-0">Nomor PO : {{ $invoiceView->po_number }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="invoice-issues-box">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="invoice-issues-date">
                                            <p>Tanggal Penerbitan : 27 Jul 2022</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="invoice-issues-date">
                                            <p>Tanggal Jatuh Tempo : 27 Agt 2022</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4">
                                        <div class="invoice-issues-date">
                                            <p>Jumlah Tagihan : ₹ 1,54,22 </p>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="invoice-item invoice-table-wrap">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="invoice-table table table-center mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Barang</th>
                                                        <th>Kategori</th>
                                                        <th>Harga/Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Diskon (%)</th>
                                                        <th class="text-end">Harga</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($invoiceDetails as $key => $value)
                                                        <tr>
                                                            <td>{{ $value->items }}</td>
                                                            <td>{{ $value->category }}</td>
                                                            <td>${{ $value->amount }}</td>
                                                            <th>{{ $value->quantity }}</th>
                                                            <th>{{ $value->discount }}%</th>
                                                            <td class="text-end">${{ $value->price }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center justify-content-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="invoice-terms">
                                        <h6>Catatan:</h6>
                                        <p class="mb-0">Masukkan catatan pelanggan atau detail lainnya</p>
                                    </div>
                                    <div class="invoice-terms">
                                        <h6>Syarat dan Ketentuan:</h6>
                                        <p class="mb-0">Masukkan catatan pelanggan atau detail lainnya</p>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="invoice-total-card">
                                        <div class="invoice-total-box">
                                            <div class="invoice-total-inner">
                                                <p>Dapat Dikenakan Pajak <span>$6,660.00</span></p>
                                                <p>Biaya Tambahan <span>$6,660.00</span></p>
                                                <p>Diskon <span>$3,300.00</span></p>
                                                <p class="mb-0">Sub total <span>$3,300.00</span></p>
                                            </div>
                                            <div class="invoice-total-footer">
                                                <h4>Jumlah Tagihan <span>${{ $invoiceView->total_amount }}</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-sign text-end">
                                <img class="img-fluid d-inline-block" src="{{ Storage::url($invoiceView->upload_sign) }}" alt="tanda tangan" style="width: 10%;">
                                <span class="d-block">{{ $invoiceView->name_of_the_signatuaory }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
