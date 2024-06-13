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
                <a href="/data-mapel-page" class="nav-link {{ request()->is('data-mapel-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Mata Pelajaran</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-kelas-page" class="nav-link {{ request()->is('data-kelas-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kelas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-siswa-page" class="nav-link {{ request()->is('data-siswa-page*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Siswa/I</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-guru-page" class="nav-link {{ request()->is('data-guru-page*') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Guru</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-ruangan-page" class="nav-link {{ request()->is('data-ruangan-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ruang kelas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-pengumuman-page"
                    class="nav-link {{ request()->is('data-pengumuman-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengumuman</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-penghargaan-page"
                    class="nav-link {{ request()->is('data-penghargaan-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Penghargaan</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/data-kegiatan-page"
                    class="nav-link {{ request()->is('data-kegiatan-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kegiatan</p>
                </a>
            </li>

        </ul>
    </li>

</ul>