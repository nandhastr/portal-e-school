<ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="{{ route('data-mapel-page') }}"
            class="nav-link {{ request()->is('data-mapel-page') ? 'active' : '' }}">
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
        <a href="/data-penghargaan-page" class="nav-link {{ request()->is('data-penghargaan-page') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Penghargaan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-kegiatan-page" class="nav-link {{ request()->is('data-kegiatan-page') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Kegiatan</p>
        </a>
    </li>

</ul>

<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <x-nav-link href="/akademi" class="nav-link {{ request()->is('akademi') ? 'active' : '' }}">
            <i class="fa-solid fa-graduation-cap"></i>
            <p>Portal<i class="fas fa-angle-left right"></i></p>
        </x-nav-link>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/data-pengumuman-page"
                    class="nav-link {{ request()->is('data-pengumuman-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pengumuman</p>
                </a>
            </li>
        </ul>
    </li>
</ul>