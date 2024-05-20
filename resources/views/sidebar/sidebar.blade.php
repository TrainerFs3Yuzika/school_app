<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Menu Utama</span>
                </li>
                <li class="{{set_active(['setting/page'])}}">
                    <a href="{{ route('setting/page') }}">
                        <i class="fas fa-cog"></i> 
                        <span>Pengaturan</span>
                    </a>
                </li>
                <li class="submenu {{set_active(['home','teacher/dashboard','student/dashboard'])}}">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dasbor</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('home') }}" class="{{set_active(['home'])}}"><i class="fas fa-home"></i> Super Admin</a></li>
                        <li><a href="{{ route('teacher/dashboard') }}" class="{{set_active(['teacher/dashboard'])}}"><i class="fas fa-chalkboard-teacher"></i> Dasbor Guru</a></li>
                        <li><a href="{{ route('student/dashboard') }}" class="{{set_active(['student/dashboard'])}}"><i class="fas fa-user-graduate"></i> Dasbor Siswa</a></li>
                    </ul>
                </li>
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
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

                <li class="submenu {{set_active(['student/list','student/grid','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }} {{ (request()->is('student/profile/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-graduation-cap"></i>
                        <span> Siswa</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('student/list') }}"  class="{{set_active(['student/list','student/grid'])}}">Daftar Siswa</a></li>
                        <li><a href="{{ route('student/add/page') }}" class="{{set_active(['student/add/page'])}}">Tambah Siswa</a></li>
                    </ul>
                </li>

                <li class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Guru</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">Daftar Guru</a></li>
                        <li><a href="{{ route('teacher/add/page') }}" class="{{set_active(['teacher/add/page'])}}">Tambah Data Guru</a></li>
                    </ul>
                </li>
                
                <li class="submenu {{set_active(['department/add/page','department/edit/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Departemen</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('department/list/page') }}" class="{{set_active(['department/list/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">Daftar Departemen</a></li>
                        <li><a href="{{ route('department/add/page') }}" class="{{set_active(['department/add/page'])}}">Tambah Departemen</a></li>
                    </ul>
                </li>

                <li class="submenu {{set_active(['subject/list/page','subject/add/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Mata Pelajaran</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}" href="{{ route('subject/list/page') }}">Daftar Mata Pelajaran</a></li>
                        <li><a class="{{set_active(['subject/add/page'])}}" href="{{ route('subject/add/page') }}">Tambah Mata Pelajaran</a></li>
                    </ul>
                </li>

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

                <li class="menu-title">
                    <span>Manajemen</span>
                </li>

                <li class="submenu {{set_active(['account/fees/collections/page','add/fees/collection/page'])}}">
                    <a href="#"><i class="fas fa-file-invoice-dollar"></i>
                        <span> Akuntansi</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['account/fees/collections/page'])}}" href="{{ route('account/fees/collections/page') }}">Pengumpulan Biaya</a></li>
                        <li><a href="expenses.html">Pengeluaran</a></li>
                        <li><a href="salary.html">Gaji</a></li>
                        <li><a class="{{set_active(['add/fees/collection/page'])}}" href="{{ route('add/fees/collection/page') }}">Tambah Biaya</a></li>
                        <li><a href="add-expenses.html">Tambah Pengeluaran</a></li>
                        <li><a href="add-salary.html">Tambah Gaji</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ url('fullcalender') }}"><i class="fas fa-holly-berry"></i> <span>Kalender Pendidikan</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-comment-dollar"></i> <span>Biaya</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-clipboard-list"></i> <span>Daftar Ujian</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calendar-day"></i> <span>Acara</span></a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-book"></i> <span>Perpustakaan</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>