<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Utama</span>
                </li>
                @if (auth()->user()->role_name === 'Super Admin')
                <li class="{{ set_active(['contact_information.index']) }}">
                    <a href="{{ route('contact_information.index') }}">
                        <i class="fas fa-cog"></i> 
                        <span>contact information</span>
                    </a>
                </li>  
                @endif              
                @if (auth()->user()->role_name === 'Super Admin')
                <li class="{{ set_active(['dokumentasi_kegiatan.index']) }}">
                    <a href="{{ route('dokumentasi_kegiatan.index') }}">
                        <i class="fas fa-file-alt"></i>
                        <span>dokumentasi kegiatan</span>
                        
                    </a>
                </li>
                
                @endif               
                <li class="submenu {{set_active(['home','teacher/dashboard','student/dashboard'])}}">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dasbor</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                        <li><a href="{{ route('home') }}" class="{{set_active(['home'])}}"><i class="fas fa-home"></i> {{ auth()->user()->role_name }}</a></li>
                        @endif
                        @if (auth()->user()->role_name === 'Teachers')
                        <li><a href="{{ route('teacher/dashboard') }}" class="{{set_active(['teacher/dashboard'])}}"><i class="fas fa-chalkboard-teacher"></i> Dasbor Guru</a></li>
                        @endif
                        @if (auth()->user()->role_name === 'Student')
                        <li><a href="{{ route('student/dashboard') }}" class="{{set_active(['student/dashboard'])}}"><i class="fas fa-user-graduate"></i> Dasbor Siswa</a></li>
                        @endif

                    </ul>
                </li>
                @if (auth()->user()->role_name === 'Super Admin')
                <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">

                        <i class="fas fa-shield-alt"></i>
                        <span>Manajemen Pengguna</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">Daftar Pengguna</a></li>
                    </ul>
                </li>
                @endif               
                @if (auth()->user()->role_name === 'Super Admin')
                <li class="submenu {{ set_active(['list/users']) }} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-user-plus"></i>
                        <span>Registrasi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('register') }}" class="{{ set_active(['list/users']) }} {{ (request()->is('')) ? 'active' : '' }}">Tambah Pengguna</a></li>
                    </ul>
                </li>
            @endif
            
                    @if (in_array(auth()->user()->role_name, ['Admin', 'Super Admin', 'Teacher', 'Kepala Sekolah']))
                    <li class="submenu {{set_active(['student/list','student/grid','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }} {{ (request()->is('student/profile/*')) ? 'active' : '' }}">
                        <a href="#"><i class="fas fa-graduation-cap"></i>
                            <span> Siswa</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ route('student/list') }}" class="{{set_active(['student/list','student/grid'])}}">
                                    <i class="fas fa-user-graduate"></i> List Siswa
                                </a>
                            </li>
                            @if (auth()->user()->role_name === 'Super Admin')
                                <li>
                                    <a href="{{ route('student/add/page') }}" class="{{set_active(['student/add/page'])}}">
                                        <i class="fas fa-user-plus"></i> Tambah Siswa
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
        
                @if (in_array(auth()->user()->role_name, ['Super Admin', 'Kepala Sekolah']))
                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Guru</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">
                                <i class="fas fa-chalkboard-teacher"></i> Daftar Guru
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('lessons.index') }}" class="{{ request()->is('lessons*') ? 'active' : '' }}">
                                <i class="fas fa-calendar-alt"></i> Daftar Jadwal
                            </a>
                        </li>
                        @if (auth()->user()->role_name === 'Super Admin')
                            <li>
                                <a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">
                                    <i class="fas fa-user-plus"></i> Tambah Data Guru
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            
                @if (auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'kepala sekolah')
                <li class="submenu {{set_active(['subject/list/page','subject/add/page', 'classes.index'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span>Kelas & Pelajaran</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}" href="{{ route('subject/list/page') }}"><i class="fas fa-list"></i> Daftar Mata Pelajaran</a></li>
                        @if (auth()->user()->role_name === 'Super Admin')
                            <li><a class="{{set_active(['subject/add/page'])}} {{ request()->is('subject/add/page') ? 'active' : '' }}" href="{{ route('subject/add/page') }}"><i class="fas fa-plus"></i>Mata Pelajaran</a></li>
                            <li><a class="{{ request()->is('classes/create') ? 'active' : '' }}" href="{{ route('classes.create') }}"><i class="fas fa-plus-circle"></i> Tambah Kelas Baru</a></li>
                        @endif
                        <li><a class="{{set_active(['classes.index'])}}" href="{{ route('classes.index') }}"><i class="fas fa-chalkboard"></i> Daftar Kelas</a></li>
                    </ul>
                </li>
            @endif

                <li class="menu-title">
                    <span>Manajemen</span>
                </li>
                <li>
                    <a href="{{ url('fullcalender') }}"><i class="fas fa-holly-berry"></i> <span>Kalender pendidikan</span></a>

                </li>
                <li class="submenu">
                    @if (in_array(auth()->user()->role_name, ['kepala sekolah', 'Student', 'Staff_perpus']))
                        <a href="#"><i class="fas fa-book"></i> <span>Perpustakaan</span> <span class="menu-arrow"></span></a>
                    @endif
                    <ul>
                        <li><a href="{{ route('books.index') }}" class="{{ request()->is('books*') ? 'active' : '' }}"><i class="fas fa-book"></i> Daftar Buku</a></li>
                        @if (in_array(auth()->user()->role_name, ['Admin', 'Super Admin', 'Staff_perpus']))
                            <li><a href="{{ route('peminjaman.index') }}" class="{{ request()->is('peminjaman*') ? 'active' : '' }}"><i class="fas fa-user"></i> Daftar Peminjam</a></li>
                            <li><a href="{{ route('pengembalian.index') }}" class="{{ request()->is('pengembalian*') ? 'active' : '' }}"><i class="fas fa-undo"></i> Daftar Pengembalian</a></li>
                            <li><a href="{{ route('tagihan.index') }}" class="{{ request()->is('tagihan') ? 'active' : '' }}"><i class="fas fa-money-bill-wave"></i> Tagihan Buku</a></li>
                        @endif
                    </ul>
                </li>
                <li class="submenu">
                    @if (auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'Student')
                    <a href="#"><i class="fas fa-futbol"></i> <span>Ekstrakurikuler</span> <span class="menu-arrow"></span></a>
                    @endif
                    <ul>
                        <li>
                            <a href="{{ route('eskuls.index') }}" class="{{ request()->is('eskuls') ? 'active' : '' }}">
                                <i class="fas fa-users"></i> Daftar Ekstrakurikuler
                            </a>
                        </li>
                        @if (auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'kepala sekolah')
                            <li>
                                <a href="{{ route('eskuls.create') }}" class="{{ request()->is('eskuls/create') ? 'active' : '' }}">
                                    <i class="fas fa-plus-circle"></i> Ekstrakurikuler
                                </a>
                            </li>
                        @endif
                        @if (auth()->user()->role_name === 'Student' || auth()->user()->role_name === 'kepala sekolah')
                            <li>
                                <a href="{{ route('daftar-eskul.create') }}" class="{{ request()->is('daftar-eskul/create') ? 'active' : '' }}">
                                    <i class="fas fa-plus-circle"></i> Daftar Eskul
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                
                
                <li class="submenu">
                    @if (in_array(auth()->user()->role_name, ['Super Admin', 'Teachers', 'Kepala Sekolah', 'Student']))
                        <a href="#" class="{{ request()->is('scores*') ? 'active' : '' }}">
                            <i class="fas fa-chart-line"></i> 
                            <span>Nilai</span> 
                            <span class="menu-arrow"></span>
                        </a>
                    @endif
                    <ul>
                        <li>
                            <a href="{{ route('scores.index') }}" class="{{ request()->is('scores') ? 'active' : '' }}">
                                <i class="fas fa-chart-bar"></i> Daftar Nilai
                            </a>
                        </li>
                        @if (in_array(auth()->user()->role_name, ['Teachers']))
                            <li>
                                <a href="{{ route('scores.create') }}" class="{{ request()->is('scores/create') ? 'active' : '' }}">
                                    <i class="fas fa-plus-circle"></i> Tambah Nilai
                                </a>
                            </li>
                        @endif                        
                    </ul>
                </li>
                <li class="submenu">
                    @if (in_array(auth()->user()->role_name, ['Admin','Student', 'Kepala Sekolah']))
                    <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Payments</span> <span class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="{{ route('tagihan_siswa.index') }}" class="{{ request()->is('tagihan-siswa') ? 'active' : '' }}"><i class="fas fa-money-bill-wave"></i> Daftar Tagihan Siswa</a></li>
                        @if (auth()->user()->role_name === 'Admin')
                            <li><a href="{{ route('tagihan_siswa.create') }}" class="{{ request()->is('tagihan-siswa/create') ? 'active' : '' }}"><i class="fas fa-money-bill-wave"></i> Tambah Tagihan Siswa</a></li>
                        @endif
                        <li><a href="{{ route('payments.index') }}" class="{{ request()->is('payments') ? 'active' : '' }}"><i class="fas fa-money-bill-wave"></i> Daftar Payments</a></li>
                    </ul>
                    @endif
                </li>
                
                
                @if (in_array(auth()->user()->role_name, ['Student', 'Teachers', 'Super Admin']))
                <li class="submenu">
                    <a href="#"><i class="fas fa-file-upload"></i> <span>Tugas</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @if (in_array(auth()->user()->role_name, ['Student', 'Super Admin', 'Teachers']))
                            <li><a href="{{ route('assignments.create') }}" class="{{ request()->is('assignments/create') ? 'active' : '' }}"><i class="fas fa-upload"></i> Upload Tugas</a></li>
                        @endif
                        <li><a href="{{ route('assignments.index') }}" class="{{ request()->is('assignments') ? 'active' : '' }}"><i class="fas fa-list"></i> Daftar Tugas</a></li>
                    </ul>
                </li>
            
                <!-- Menu Pembelajaran Siswa -->
                <li class="submenu">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span>Pembelajaran Siswa</span> <span class="menu-arrow"></span></a>
                    <ul>
                        @if (in_array(auth()->user()->role_name, ['Super Admin', 'Teachers']))
                            <li><a href="{{ route('pembelajaran_siswa.create') }}" class="{{ request()->is('pembelajaran_siswa/create') ? 'active' : '' }}"><i class="fas fa-plus"></i> Tambah Pembelajaran Siswa</a></li>
                        @endif
                        <li><a href="{{ route('pembelajaran_siswa.index') }}" class="{{ request()->is('pembelajaran_siswa') ? 'active' : '' }}"><i class="fas fa-list"></i> Daftar Pembelajaran Siswa</a></li>
                    </ul>
                </li>
            @endif
            
                
                    @if (auth()->user()->role_name === 'Super Admin')
                    <li class="submenu">
                        <a href="#"><i class="fas fa-question-circle"></i>
                            <span>FAQ</span> <span class="menu-arrow"></span></a>
                        <ul>
                            <li><a href="{{ route('faq.index') }}" class="{{ request()->is('faq') ? 'active' : '' }}"><i class="fas fa-list"></i> Daftar FAQ</a></li>
                        </ul>
                    </li>
                    @endif  
            </ul>
        </div>
    </div>
</div>
