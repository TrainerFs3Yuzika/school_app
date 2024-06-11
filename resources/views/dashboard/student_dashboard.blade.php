@extends('layouts.master')
@section('content')
    {{-- pesan --}}
    {!! Toastr::message() !!}
    
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Selamat Datang {{ Auth::user()->name }}, {{ Auth::user()->role_name }} </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Siswa</li>
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
                                    <h6>Mata Pelajaran</h6>
                                    <h3>{{ \App\Models\Subject::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/teacher-icon-01.svg') }}" alt="Ikon Dasbor">
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
                                    <h6>Jadwal</h6>
                                    <h3>{{ \App\Models\Lessons::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{URL::to('assets/img/icons/teacher-icon-02.svg')}}" alt="Ikon Dasbor">
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
                                    <h6>Ujian yang Diikuti</h6>
                                    <h3>{{ \App\Models\Eskul::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{URL::to('assets/img/icons/student-icon-01.svg')}}" alt="Ikon Dasbor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                use App\Models\ContactInformation;
                
                $contactInformation = ContactInformation::first(); // Mengambil satu data pertama
                
                ?>
                
                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Narahubung</h6>
                                    </div>
                                <div class="db-icon">
                                    <!-- WhatsApp Icon -->
                                    <div class="db-icon">
                                        <!-- WhatsApp Icon -->
                                        <a href="https://wa.me/<?= $contactInformation->whatsapp ?>" target="_blank">
                                            <i class="fab fa-whatsapp fa-lg"></i>
                                        </a>
                                    </div>
                                    
                                </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row">
                <div class="col-12 col-lg-12 col-xl-8">
                    <div class="card flex-fill comman-shadow">
                        <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Pelajaran Hari ini</h5>
                                        </div>
                                        <div class="col-6">
                                            <span class="float-end view-link"><a href="{{ route('lessons.index') }}">Lihat
                                                    Semua
                                                    Jadwal</a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="pt-3 pb-3">
                                    @if (\Carbon\Carbon::setLocale('id') && ($today = \Carbon\Carbon::now()->isoFormat('dddd')))
                                        @if ($lessons = \App\Models\Lessons::where('days', $today)->with('subject')->get())
                                            @foreach ($lessons as $lesson)
                                                <div class="table-responsive lesson">
                                                    <table class="table table-center">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <div class="date">
                                                                        <b>Kelas {{ $lesson->class }} {{ $lesson->class_type }}</b>
                                                                        <p>{{ $lesson->subject->subject_name }}</p>
                                                                        <ul class="teacher-date-list">
                                                                            <li><i class="fas fa-calendar-alt me-2"></i>
                                                                                {{ $lesson->days }}
                                                                                {{\Carbon\Carbon::now()->format('j M, Y')}}</li>
                                                                            <li>|</li>
                                                                            <li><i
                                                                                    class="fas fa-clock me-2"></i>{{ \Carbon\Carbon::parse($lesson->time_start)->format('H:i') }}
                                                                                -
                                                                                {{ \Carbon\Carbon::parse($lesson->time_end)->format('H:i') }}
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="lesson-confirm">
                                                                        <a href="#">Dikonfirmasi</a>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-info">Jadwal
                                                                        Ulang</button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @endforeach
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">                       
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title">Riwayat Pengajaran</h5>
                                    <ul class="chart-list-out student-ellips">
                                        <li class="star-menus"><a href="javascript:;"><i
                                                    class="fas fa-ellipsis-v"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="teaching-card">
                                        <ul class="steps-history">
                                            <li>Sep22</li>
                                            <li>Sep23</li>
                                            <li>Sep24</li>
                                        </ul>
                                        <ul class="activity-feed">
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Matematika</a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>5 September,
                                                            2022</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 pagi - 10:00 pagi (60
                                                            Menit)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">Sedang Berlangsung</button>
                                                </div>
                                            </li>
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Geografi </a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>5 September,
                                                            2022</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 pagi - 10:00 pagi (60
                                                            Menit)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns complete ms-auto">
                                                    <button type="submit" class="btn btn-info">Selesai</button>
                                                </div>
                                            </li>
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Botani</a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>5 September,
                                                            2022</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 pagi - 10:00 pagi (60
                                                            Menit)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">Sedang Berlangsung</button>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-12 col-xl-4 d-flex">
                    <div class="card flex-fill comman-shadow">
                        <div class="card-body">
                            <div id="calendar-doctor" class="calendar-container"></div>
                            <div class="calendar-info calendar-info1">
                                <div class="up-come-header mb-3">
                                    <h2>Acara Mendatang</h2>
                                </div>
                                <div class="table-responsive">
                                    <table id="eventTable" class="table star-student table-hover table-center table-borderless table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>ID</th>
                                                <th>Judul Acara</th>
                                                <th>Waktu Mulai</th>
                                                <th>Waktu Berakhir</th>
                                                <th>Durasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\App\Models\Event::all() as $event)
                                                <tr>
                                                    <td>{{ $event->id }}</td>
                                                    <td>{{ $event->title }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start)->format('d M Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->end)->format('d M Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start)->diffInHours(\Carbon\Carbon::parse($event->end)) }} jam</td>
                                                    <td>
                                                        <div class="actions">
                                                            <a href="{{ url('fullcalender') }}" class="btn btn-sm">
                                                                <i class="fas fa-sign-in-alt me-2"></i>
                                                            </a>
                                                        </div>
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
                                
                <div class="row">
                    <div class="col-xl-6 d-flex">               
                        <div class="card flex-fill student-space comman-shadow">
                            <div class="card-header d-flex align-items-center justify-content-between mb-3">
                                <h5 class="card-title">Daftar Buku</h5>
                                <ul class="chart-list-out student-ellipsis">
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div>
                                    <div class="table-responsive">
                                        <table id="bookTable" class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Judul</th>
                                                    <th>Penulis</th>
                                                    <th>Penerbit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Genre</th>
                                                    <th>Stok</th>
                                                    {{-- <th>Aksi</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach (\App\Models\Book::all() as $book)
                                                    <tr>
                                                        <td>{{ $book->judul }}</td>
                                                        <td>{{ $book->penulis }}</td>
                                                        <td>{{ $book->penerbit }}</td>
                                                        <td>{{ $book->tahun_terbit }}</td>
                                                        <td>{{ $book->genre }}</td>
                                                        <td>{{ $book->stok }}</td>
                                                        {{-- <td>
                                                            <div class="actions">
                                                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm bg-danger-light">
                                                                    <i class="far fa-edit me-2"></i>
                                                                </a>
                                                                <form method="POST" action="{{ route('books.destroy', $book->id) }}" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                                                        <i class="far fa-trash-alt me-2"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#bookTable').DataTable();
                            });
                        </script>
                    </div>

                    <div class="col-xl-6 d-flex">
                        <div class="card flex-fill comman-shadow">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="card-title">Daftar Peminjaman Buku</h5>
                                <ul class="chart-list-out student-ellips">
                                    <li class="star-menus"><a href="javascript:;"><i class="fas fa-ellipsis-v"></i></a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table border-0 star-book table-hover table-center mb-0 datatable table-striped">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Judul Buku</th>
                                                <th scope="col">Nama Peminjam</th>
                                                <th scope="col">Tanggal Pinjam</th>
                                                <th scope="col">Tanggal Kembali</th>
                                                <th scope="col">Jumlah Buku</th>
                                                <th scope="col">Status</th>
                                                {{-- <th scope="col">Aksi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\App\Models\Peminjaman::all() as $key => $peminjaman)
                                                <tr>
                                                    <td>{{ ++$key }}</td>
                                                    <td>{{ $peminjaman->id }}</td>
                                                    <td>{{ $peminjaman->book->judul }}</td>
                                                    <td>{{ $peminjaman->nama_peminjam }}</td>
                                                    <td>{{ $peminjaman->tanggal_pinjam }}</td>
                                                    <td>{{ $peminjaman->tanggal_kembali }}</td>
                                                    <td>{{ $peminjaman->jumlah_buku }}</td>
                                                    <td>{{ $peminjaman->status }}</td>
                                                    {{-- <td>
                                                        <div class="actions">
                                                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-sm bg-danger-light">
                                                                <i class="far fa-edit me-2"></i>
                                                            </a>
                                                            <form method="POST" action="{{ route('peminjaman.destroy', $peminjaman->id) }}" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm bg-danger-light" onclick="return confirm('Apakah Anda yakin ingin menghapus peminjaman ini?')">
                                                                    <i class="far fa-trash-alt me-2"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Initialize DataTables -->
                        <script>
                            $(document).ready(function() {
                                $('.datatable').DataTable();
                            });
                        </script>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
