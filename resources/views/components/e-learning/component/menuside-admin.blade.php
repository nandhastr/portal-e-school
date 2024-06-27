{{-- sidebar elearning --}}
{{-- <ul class="nav nav-treeview">
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

</ul> --}}



{{-- sidebar portal --}}
<ul class="nav nav-treeview">
    <li class="nav-item">
        <a href="/data-user" class="nav-link {{ request()->is('data-user') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Admin User</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-profil-sekolah" class="nav-link {{ request()->is('data-profil-sekolah') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Porfile Sekolah</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-pengumuman" class="nav-link {{ request()->is('data-pengumuman') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Pengumuman</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-artikel" class="nav-link {{ request()->is('data-artikel') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Artikel/berita</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-guru" class="nav-link {{ request()->is('data-guru') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Guru</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-siswa" class="nav-link {{ request()->is('data-siswa') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Siswa</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-alumni" class="nav-link {{ request()->is('data-alumni') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Alumni</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-karyawan" class="nav-link {{ request()->is('data-karyawan') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master karyawan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-struktur" class="nav-link {{ request()->is('data-struktur') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Struktur Organisasi</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-visimisi" class="nav-link {{ request()->is('data-visimisi') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Visi & Misi</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-galeri" class="nav-link {{ request()->is('data-galeri') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Galeri</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-kegiatan" class="nav-link {{ request()->is('data-kegiatan') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Kegiatan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-prestasi" class="nav-link {{ request()->is('data-prestasi') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Siswa Berprestasi</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/data-komponenSekolah" class="nav-link {{ request()->is('data-komponenSekolah') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Master Komponen Sekolah</p>
        </a>
    </li>
    {{-- <li class="nav-item has-treeview">
        <x-nav-link href="#" class="nav-link {{ request()->is('kegiatan/*') ? 'active' : '' }}">
            <i class="far fa-circle nav-icon"></i>
            <p class="text-primary fw-bold">Master Kegiatan<i class="right fas fa-angle-left"></i></p>
        </x-nav-link>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="/kegiatan/uks" class="nav-link {{ request()->is('kegiatan/uks') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>UKS</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kegiatan/osis" class="nav-link {{ request()->is('kegiatan/osis') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>OSIS</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kegiatan/pramuka" class="nav-link {{ request()->is('kegiatan/pramuka') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pramuka</p>
                </a>
            </li>
        </ul>
    </li> --}}
</ul>