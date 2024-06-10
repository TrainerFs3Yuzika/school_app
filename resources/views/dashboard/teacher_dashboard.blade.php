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
                            <h3 class="page-title">Selamat Datang {{ Auth::user()->name }},
                                {{ Auth::user()->role_name ? 'Guru' : '' }}
                            </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                                <li class="breadcrumb-item active">Guru</li>
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
                                    <h6>Total Kelas</h6>
                                    <h3>{{ \App\Models\ClassModel::count() }}/{{ \App\Models\ClassModel::all()->count() }}
                                    </h3>
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
                                    <h6>Total Siswa</h6>
                                    <h3>{{ \App\Models\Student::count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/dash-icon-01.svg') }}" alt="Ikon Dasbor">
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
                                    <h6>Total Pelajaran</h6>
                                    <h3>{{ \App\Models\Subject::count() }}/{{ \App\Models\Subject::all()->count() }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/teacher-icon-02.svg') }}" alt="Ikon Dasbor">
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
                                    <h6>Total Jam</h6>
                                    <h3>15/20</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="{{ URL::to('assets/img/icons/teacher-icon-03.svg') }}" alt="Ikon Dasbor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-12 col-xl-8">
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
                    
                    <div class="row">
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <h5 class="card-title">Daftar Siswa</h5>
                                        </div>
                                        <table id="studentList" class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                                <thead class="student-thread">
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Nama Orang Tua</th>
                                        <th>Nomor Ponsel</th>
                                        <th>Alamat</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach (\App\Models\Student::all() as $key => $list)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td>{{ ++$key }}</td>
                                        <td hidden class="id">{{ $list->id }}</td>
                                        <td hidden class="avatar">{{ $list->upload }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="student-details.html" class="avatar avatar-sm me-2">
                                                    <img class="avatar-img rounded-circle" src="{{ Storage::url('student-photos/'.$list->upload) }}" alt="Gambar Pengguna">
                                                </a>
                                                <a href="student-details.html">{{ $list->first_name }} {{ $list->last_name }}</a>
                                            </h2>
                                        </td>
                                        <td>{{ $list->class }} {{ $list->section }}</td>
                                        <td>{{ $list->date_of_birth }}</td>
                                        <td>{{ $list->parent_name }}</td>
                                        <td>{{ $list->phone_number }}</td>
                                        <td>{{ $list->address }}</td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-lg-12 col-xl-12 d-flex">
                            <div class="card flex-fill comman-shadow">
                                <div class="card-header d-flex align-items-center">
                                    <h5 class="card-title">Riwayat Mengajar</h5>
                                    <ul class="chart-list-out student-ellips">
                                        <li class="star-menus"><a href="javascript:;"><i
                                                    class="fas fa-ellipsis-v"></i></a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="teaching-card">
                                        <ul class="steps-history">
                                            <li>22 Sep</li>
                                            <li>23 Sep</li>
                                            <li>24 Sep</li>
                                        </ul>
                                        <ul class="activity-feed">
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Matematika</a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>5 September,
                                                            2022</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 - 10:00 pagi (60
                                                            Menit)</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">Sedang
                                                        Berlangsung</button>
                                                </div>
                                            </li>
                                            <li class="feed-item d-flex align-items-center">
                                                <div class="dolor-activity">
                                                    <span class="feed-text1"><a>Geografi </a></span>
                                                    <ul class="teacher-date-list">
                                                        <li><i class="fas fa-calendar-alt me-2"></i>5 September,
                                                            2022</li>
                                                        <li>|</li>
                                                        <li><i class="fas fa-clock me-2"></i>09:00 - 10:00 pagi</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
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
                                                        <li><i class="fas fa-clock me-2"></i>09:00 - 10:00 pagi</li>
                                                    </ul>
                                                </div>
                                                <div class="activity-btns ms-auto">
                                                    <button type="submit" class="btn btn-info">Sedang
                                                        Berlangsung</button>
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
                                    <table id="eventTable"
                                        class="table star-student table-hover table-center table-borderless table-striped">
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
                                                    <td>{{ \Carbon\Carbon::parse($event->start)->format('d M Y H:i') }}
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($event->end)->format('d M Y H:i') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($event->start)->diffInHours(\Carbon\Carbon::parse($event->end)) }}
                                                        jam</td>
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
            </div>
        </div>
    </div>
@endsection
