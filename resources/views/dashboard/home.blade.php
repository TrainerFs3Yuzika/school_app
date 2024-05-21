@extends('layouts.master')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
{{-- message --}}
{!! Toastr::message() !!}
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title"><span style="color: blue;">Welcome</span> {{ Session::get('name') }}!</h3>
                        <hr style="border: none; height: 2px; background-color: blue; animation: underline 2s infinite;">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ Session::get('name') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6><span style="color: rgb(3, 3, 3); font-weight: bold;">Total Murid</span></h6>
                                <h3>{{ \App\Models\Student::count() }}</h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-user-graduate" style="font-size: 2em; color: #141b1f;"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6><span style="color: rgb(0, 0, 0); font-weight: bold;">Jumlah Guru</span></h6>
                                <h3>{{ \App\Models\Teacher::count() }}</h3>
                            </div>
                            <div class="db-icon">
                                <i class="fas fa-chalkboard-teacher" style="font-size: 2em; color: #3498db;"></i>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                        <div class="db-info">
                            <h6><span style="color: rgb(0, 0, 0); font-weight: bold;">Orang Tua</span></h6>
                            <h3>{{ \App\Models\Student::distinct('parent_name')->count('parent_name') }}</h3>
                        </div>

                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/dash-icon-03.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12 d-flex">
                <div class="card bg-comman w-100">
                    <div class="card-body">
                        <div class="db-widgets d-flex justify-content-between align-items-center">
                            <div class="db-info">
                                <h6><span style="color: rgb(0, 0, 0); font-weight: bold;">Pendapatan</span></h6>
                                <h3>Rp.</h3>
                            </div>
                            <div class="db-icon">
                                <img src="{{ URL::to('assets/img/icons/dash-icon-04.svg') }}" alt="Dashboard Icon">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-chart">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-12 text-center">
                                    <h5 class="card-title">Jenis Kelamin</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var ctx = document.getElementById('genderChart').getContext('2d');
                                var genderChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Perempuan', 'Laki-laki'],
                                        datasets: [{
                                            label: 'Jumlah Siswa',
                                            data: [{{ \App\Models\Student::where('gender', 'Perempuan')->count() }}, {{ \App\Models\Student::where('gender', 'Laki-laki')->count() }}],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.6)',
                                                'rgba(54, 162, 235, 0.6)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)'
                                            ],
                                            borderWidth: 2,
                                            hoverOffset: 4
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        plugins: {
                                            legend: {
                                                position: 'top',
                                            },
                                            tooltip: {
                                                enabled: true,
                                                mode: 'point'
                                            }
                                        },
                                        animation: {
                                            animateScale: true,
                                            animateRotate: true
                                        },
                                        aspectRatio: 2 // Menambahkan aspect ratio untuk lebih memperkecil ukuran chart
                                    }
                                });
                            });
                            </script>
                            <canvas id="genderChart"></canvas>
                            <div class="text-center">
                                <div>Total Perempuan: {{ \App\Models\Student::where('gender', 'Perempuan')->count() }}</div>
                                <div>Total Laki-laki: {{ \App\Models\Student::where('gender', 'Laki-laki')->count() }}</div>
                            </div>
                            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-shadow">
                        <div class="card-header bg-success text-white">
                            <h5 class="card-title mb-0">Detail Invoice</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Biaya Tambahan</th>
                                            <th>Detail</th>
                                            <th>Diskon</th>
                                            <th>Detail Pembayaran</th>
                                            <th>Total Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\App\Models\InvoiceCustomerName::all() as $invoice)
                                            <tr>
                                                <td>{{ $invoice->customer_name }}</td>
                                                <td>{{ \App\Models\InvoiceAdditionalCharges::where('invoice_id', $invoice->id)->sum('amount') }}</td>
                                                <td>{{ \App\Models\InvoiceDetails::where('invoice_id', $invoice->id)->pluck('description')->implode(', ') }}</td>
                                                <td>{{ \App\Models\InvoiceDiscount::where('invoice_id', $invoice->id)->sum('discount_amount') }}</td>
                                                <td>{{ \App\Models\InvoicePaymentDetails::where('invoice_id', $invoice->id)->pluck('payment_method')->implode(', ') }}</td>
                                                <td>{{ \App\Models\InvoiceTotalAmount::where('invoice_id', $invoice->id)->sum('total_amount') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Data Kelas --}}
            <div class="row">
                <div class="col-xl-12">
                    <div class="card shadow-lg" style="border-radius: 15px;">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Data Kelas</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover table-center rounded" style="border-radius: 15px;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Kelas</th>
                                            <th>Nama Guru</th>
                                            <th>Nama Siswa</th>
                                            <th>Nama Mata Pelajaran</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(\App\Models\ClassModel::all() as $class)
                                            <tr>
                                                <td>{{ $class->id }}</td>
                                                <td>{{ $class->class_name }}</td>
                                                <td>{{ $class->teacher->full_name }}</td>
                                                <td>{{ $class->student->first_name }} {{ $class->student->last_name }}</td>
                                                <td>{{ $class->subject->class }}</td>
                                                <td>
                                                    <a href="{{ route('classes.edit', $class->id) }}" class="btn btn-sm btn-warning edit-btn"><i class="fas fa-edit"></i> Edit</a>
                                                    <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="d-inline delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger delete-btn"><i class="fas fa-trash-alt"></i> Hapus</button>
                                                    </form>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('classes.create') }}" class="btn btn-primary mb-3">Tambah Kelas Baru</a>
            {{-- Data Kelas --}}

            <!--Tambahkan Script Font Awesome -->
            <script src="https://kit.fontawesome.com/a076d05399.js"></script>


        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0">Jadwal Event Mendatang</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Judul Event</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Berakhir</th>
                                        <th>Durasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\Event::all() as $event)
                                        <tr>
                                            <td>{{ $event->id }}</td>
                                            <td>{{ $event->title }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->start)->format('d M Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->end)->format('d M Y H:i') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($event->start)->diffInHours(\Carbon\Carbon::parse($event->end)) }} jam</td>
                                            <td><a href="{{ url('fullcalender') }}">Kunjungi</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0">Data Pengguna</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover table-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Tanggal Pendaftaran</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach(\App\Models\User::all() as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->created_at->format('d M Y') }}</td>
                                            <td>{{ $user->role_name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill student-space comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title">Siswa Berprestasi</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table star-student table-hover table-center table-borderless table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th class="text-center">Nilai</th>
                                        <th class="text-center">Persentase</th>
                                        <th class="text-end">Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>PRE2209</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="profile.html">
                                                <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}" width="25" alt="Star Students"> Raka Wiratama
                                            </a>
                                        </td>
                                        <td class="text-center">1185</td>
                                        <td class="text-center">98%</td>
                                        <td class="text-end">
                                            <div>2019</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>PRE1245</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="profile.html">
                                                <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}" width="25" alt="Star Students"> Anisa Putri
                                            </a>
                                        </td>
                                        <td class="text-center">1195</td>
                                        <td class="text-center">99.5%</td>
                                        <td class="text-end">
                                            <div>2018</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>PRE1625</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="profile.html">
                                                <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}" width="25" alt="Star Students"> Bima Arya
                                            </a>
                                        </td>
                                        <td class="text-center">1196</td>
                                        <td class="text-center">99.6%</td>
                                        <td class="text-end">
                                            <div>2017</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>PRE2516</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="profile.html">
                                                <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}" width="25" alt="Star Students"> Cinta Laura
                                            </a>
                                        </td>
                                        <td class="text-center">1187</td>
                                        <td class="text-center">98.2%</td>
                                        <td class="text-end">
                                            <div>2016</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">
                                            <div>PRE2209</div>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="profile.html">
                                                <img class="rounded-circle"src="{{ URL::to('assets/img/profiles/avatar-01.jpg') }}" width="25" alt="Star Students"> Dian Sastro
                                            </a>
                                        </td>
                                        <td class="text-center">1185</td>
                                        <td class="text-center">98%</td>
                                        <td class="text-end">
                                            <div>2015</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xl-6 d-flex">

                <div class="card flex-fill comman-shadow">
                    <div class="card-header d-flex align-items-center">
                        <h5 class="card-title ">Aktivitas Siswa</h5>
                        <ul class="chart-list-out student-ellips">
                            <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="activity-groups">
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-01.svg" alt="Penghargaan">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Tempat pertama dalam "Catur”</h4>
                                    <h5>John Doe memenangkan tempat pertama dalam "Catur"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>1 Hari yang lalu</span>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-02.svg" alt="Penghargaan">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Berpartisipasi dalam "Carrom"</h4>
                                    <h5>Justin Lee berpartisipasi dalam "Carrom"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>2 jam yang lalu</span>
                                </div>
                            </div>
                            <div class="activity-awards">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-03.svg" alt="Penghargaan">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Konferensi internasional di "Sekolah St.John"</h4>
                                    <h5>Justin Lee menghadiri konferensi internasional di "Sekolah St.John"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>2 Minggu yang lalu</span>
                                </div>
                            </div>
                            <div class="activity-awards mb-0">
                                <div class="award-boxs">
                                    <img src="assets/img/icons/award-icon-04.svg" alt="Penghargaan">
                                </div>
                                <div class="award-list-outs">
                                    <h4>Memenangkan tempat pertama dalam "Catur"</h4>
                                    <h5>John Doe memenangkan tempat pertama dalam "Catur"</h5>
                                </div>
                                <div class="award-time-list">
                                    <span>3 Hari yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill fb sm-box">
                    <div class="social-likes">
                        <p>Like us on facebook</p>
                        <h6>50,095</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill twitter sm-box">
                    <div class="social-likes">
                        <p>Follow us on twitter</p>
                        <h6>48,596</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill insta sm-box">
                    <div class="social-likes">
                        <p>Follow us on instagram</p>
                        <h6>52,085</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card flex-fill linkedin sm-box">
                    <div class="social-likes">
                        <p>Follow us on linkedin</p>
                        <h6>69,050</h6>
                    </div>
                    <div class="social-boxs">
                        <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
