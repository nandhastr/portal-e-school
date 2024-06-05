<ul class="nav nav-treeview">
    <li class="nav-item">
        {{-- <x-nav-link href="/all-class" class="nav-link {{ request()->is('all-class') ? 'active' : '' }}">
            <i class="fa-solid fa-swatchbook"></i>
            <p>side admin</p>
        </x-nav-link> --}}
    <li
        class="nav-item {{ request()->is('admin/subject*', 'admin/class*', 'admin/students*', 'admin/qna-ans*') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#"
            class="nav-link {{ request()->is('admin/subject*', 'admin/class*', 'admin/students*', 'admin/qna-ans*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Master Data<i class="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/mapel-page" class="nav-link {{ request()->is('mapel-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mata Pelajaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kelas-page" class="nav-link {{ request()->is('kelas-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/siswa-page" class="nav-link {{ request()->is('siswa-page*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Siswa/I</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/soal-page" class="nav-link {{ request()->is('soal-page*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Soal</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="/admin/exam" class="nav-link {{ request()->is('admin/exam*') ? 'active' : '' }}">
            <i class="fas fa-file nav-icon"></i>
            <p>Ujian</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/admin/review-exams" class="nav-link {{ request()->is('admin/review-exams*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-copy"></i>
            <p>Hasil Ujian</p>
        </a>
    </li>
    </li>
</ul>