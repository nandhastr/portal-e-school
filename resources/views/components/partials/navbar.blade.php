{{-- <x-partials.header></x-partials.header> --}}
<nav {{ $attributes }}>
    <div class="container">
        <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-dark"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav d-flex justify-content-center align-items-center w-100">
                <li class="nav-item mx-3">
                    <x-nav-link href="/" class="nav-link {{ request()->is('/') ? 'navActive' : '' }} a-nav">
                        <i class="fa-solid fa-house fa-lg"></i>
                    </x-nav-link>
                </li>
                <li class="nav-item mx-3">
                    <div class="dropdown">
                        <x-nav-link
                            class=" dropdown-toggle nav-link a-nav a-nav2 {{ request()->is('lainnya') ? 'navActive' : '' }}"
                            href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PROFILE
                        </x-nav-link>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="dropdown-item a-nav2" href="/about">TENTANG SEKOLAH</a></li>
                            <li class="nav-item"><a class="dropdown-item a-nav2" href="/visi">VISI & MISI</a></li>
                            <li class="nav-item"><a class="dropdown-item a-nav2"
                                    href="/struktur-organisasi">KEPENGURUSAN</a></li>
                            <li class="nav-item"><a class="dropdown-item a-nav2" href="/program">PROGRAM SEKOLAH</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mx-3">
                    <div class="dropdown">
                        <x-nav-link
                            class=" dropdown-toggle nav-link a-nav a-nav2 {{ request()->is('direktori') ? 'navActive' : '' }}"
                            href="direktori" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            DIREKTORI
                        </x-nav-link>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="dropdown-item a-nav2" href="/tendik">DIREKTORI TENAGA
                                    PENDIDIK</a></li>
                            <li class="nav-item"><a class="dropdown-item a-nav2" href="/alumni">DIREKTORI ALUMNI</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item mx-3">
                    <x-nav-link href="/siswa" class="nav-link {{ request()->is('siswa') ? 'navActive' : '' }} a-nav">
                        PRESTASI SISWA
                    </x-nav-link>
                </li>
                <li class="nav-item mx-3">
                    <div class="dropdown">
                        <x-nav-link href="/album" class="nav-link {{ request()->is('album') ? 'navActive' : '' }} a-nav">
                        GALERI FOTO
                    </x-nav-link>
                    </div>
                </li>
                <li class="nav-item mx-3">
                    <div class="dropdown">
                        <x-nav-link href="/keg-osis" class="nav-link {{ request()->is('keg-osis') ? 'navActive' : '' }} a-nav">
                        KEGIATAN
                    </x-nav-link>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>