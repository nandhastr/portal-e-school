
{{-- sidebar portal --}}
@if (Auth::user()->role == 'admin')
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-database"></i>
        <p>Master Data<i class="right fas fa-angle-left"></i></p>
    </a>
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
                <p>Master Profil Sekolah</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/data-pengumuman" class="nav-link {{ request()->is('data-pengumuman') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Pengumuman</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-users"></i>
        <p>Data Personil<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
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
                <p>Master Karyawan</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">
        <i class="fa-solid fa-swatchbook"></i>
        <p>Data Sekolah<i class="right fas fa-angle-left"></i></p>
    </a>
    <ul class="nav nav-treeview">
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
            <a href="/data-komponenSekolah"
                class="nav-link {{ request()->is('data-komponenSekolah') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Komponen Sekolah</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/data-event" class="nav-link {{ request()->is('data-event') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Event Kalender</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="/data-slider" class="nav-link {{ request()->is('data-slider') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Master Gambar Slide</p>
            </a>
        </li>
    </ul>
</li>
@elseif (Auth::user()->role == 'osis')
<li class="nav-item">
    <a href="/data-kegiatan" class="nav-link {{ request()->is('data-kegiatan') ? 'active' : '' }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Master Kegiatan</p>
    </a>
</li>

@endif