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
                        <span>Pengaturan</span>
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
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'Teacher')
                <li class="submenu {{set_active(['student/list','student/grid','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }} {{ (request()->is('student/profile/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Siswa</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student/list') }}"  class="{{set_active(['student/list','student/grid'])}}">Daftar Siswa</a></li>
                        @if (auth()->user()->role_name === 'Super Admin')
                        <li><a href="{{ route('student/add/page') }}" class="{{set_active(['student/add/page'])}}">Tambah Siswa</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>

                        <span> Guru</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">Daftar Guru</a></li>
                        <li><a href="{{ route('lessons.index') }}" class="{{ request()->is('lessons*') ? 'active' : '' }}">Daftar Jadwal</a></li>
                        @if (auth()->user()->role_name === 'Super Admin')
                        <li><a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">Tambah Data Guru</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                <li class="submenu {{set_active(['subject/list/page','subject/add/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span>Kelas & Pelajaran</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}" href="{{ route('subject/list/page') }}">Daftar Mata Pelajaran</a></li>
                        @if (auth()->user()->role_name === 'Super Admin')
                        <li><a class="{{set_active(['subject/add/page'])}}" href="{{ route('subject/add/page') }}">Tambah Mata Pelajaran</a></li>
                        <li><a href="{{ route('classes.create') }}">Tambah Kelas Baru</a></li>
                        @endif
                    </ul>
                </li>
                @endif
                

                <li class="menu-title">
                    <span>Manajemen</span>
                </li>
                @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                <li class="submenu {{set_active(['invoice/list/page','invoice/paid/page',
                    'invoice/overdue/page','invoice/draft/page','invoice/recurring/page',
                    'invoice/cancelled/page','invoice/grid/page','invoice/add/page',
                    'invoice/view/page','invoice/settings/page',
                    'invoice/settings/tax/page','invoice/settings/bank/page'])}}" {{ request()->is('invoice/edit/*') ? 'active' : '' }}>
                    <a href="#"><i class="fas fa-clipboard"></i>
                        <span> Faktur</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['invoice/list/page','invoice/paid/page','invoice/overdue/page','invoice/draft/page','invoice/recurring/page','invoice/cancelled/page'])}}" href="{{ route('invoice/list/page') }}">Daftar Faktur</a></li>
                        <li><a class="{{set_active(['invoice/grid/page'])}}" href="{{ route('invoice/grid/page') }}">Tampilan Grid Faktur</a></li>
                        <li><a class="{{set_active(['invoice/add/page'])}}" href="{{ route('invoice/add/page') }}">Tambah Faktur</a></li>
                    </ul>
                </li>
                @endif
                <li>
                    <a href="{{ url('fullcalender') }}"><i class="fas fa-holly-berry"></i> <span>Acara</span></a>

                </li>
                <li class="submenu">
                    @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'Student')
                    <a href="#"><i class="fas fa-book"></i> <span>Perpustakaan</span> <span class="menu-arrow"></span></a>
                    @endif
                    <ul>
                        <li><a href="{{ route('books.index') }}">Daftar Buku</a></li>
                        @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                        <li><a href="{{ route('peminjaman.index') }}">Daftar Peminjam</a></li>
                        @endif
                    </ul>
                </li>                
                <li class="submenu">
                    @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin' || auth()->user()->role_name === 'Student')
                    <a href="#"><i class="fas fa-futbol"></i> <span>Eskul</span> <span class="menu-arrow"></span></a>
                    @endif
                    <ul>
                        <li><a href="{{ route('eskuls.index') }}">Daftar Eskul</a></li>
                        @if (auth()->user()->role_name === 'Admin' || auth()->user()->role_name === 'Super Admin')
                        <li><a href="{{ route('eskuls.create') }}">Tambah Eskul</a></li>
                        @endif
                    </ul>
                </li>
                
                <li class="submenu">
                    @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin' || Session::get('role_name') === 'Teachers')
                    <a href="#"><i class="fas fa-chart-line"></i> <span>Nilai</span> <span class="menu-arrow"></span></a>
                    @endif
                    <ul>
                        <li><a href="{{ route('scores.index') }}">Daftar Nilai</a></li>
                        @if (auth()->user()->role_name === 'Super Admin' || Session::get('role_name') === 'Teachers')
                        <li><a href="{{ route('scores.create') }}">Tambah Nilai</a></li>
                        @endif
                    </ul>
                </li>                
                <li class="submenu">
                    @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin' || Session::get('role_name') === 'Teachers')
                    <a href="#"><i class="fas fa-money-bill-alt"></i> <span>Payments</span> <span class="menu-arrow"></span></a>
                    @endif
                    <ul>
                        <li><a href="{{ route('payments.index') }}">Daftar Payments</a></li>
                        @if (auth()->user()->role_name === 'Super Admin' || Session::get('role_name') === 'Teachers')
                        {{-- <li><a href="{{ route('payments.create') }}">Tambah Payments</a></li> --}}
                        @endif
                    </ul>
                </li>
                
                
            </ul>
        </div>
    </div>
</div>
