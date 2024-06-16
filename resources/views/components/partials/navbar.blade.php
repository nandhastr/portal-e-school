{{-- <x-partials.header></x-partials.header> --}}
<nav {{ $attributes }}>
    <div class="container-fluid">
        <div class="container">
            <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-dark"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <x-nav-link href="/" class="nav-link {{ request()->is('/') ? 'active' : '' }} px-5 a-nav">
                            <i class="fa-solid fa-house"></i>
                        </x-nav-link>
                    </li>
                    {{-- <li class="nav-item">
                        <x-nav-link href="/e-learning"
                            class="nav-link {{ request()->is('e-learning') ? 'active' : '' }} px-5 a-nav">Academy
                        </x-nav-link>
                    </li> --}}
                    <li class="nav-item ">
                        <div class="dropdown ">
                            <x-nav-link
                                class="px-5 dropdown-toggle drop-link a-nav a-nav2 {{ request()->is('lainnya') ? 'active' : '' }}"
                                href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                PROFILE
                            </x-nav-link>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/sejarah">Sejarah
                                        Sekolah</a>
                                </li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/visi">Visi & Misi</a>
                                </li>
                                <li class="nav-item"><a class="dropdown-item a-nav2"
                                        href="/struktur-organisasi">Struktur
                                        Organisasi</a></li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/tendik">Guru Dan
                                        Karyawan</a>
                                </li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/program">Program
                                        Sekolah</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="/album"
                            class="nav-link {{ request()->is('album') ? 'active' : '' }} px-5 a-nav">
                            VISI & MISI</x-nav-link>
                    </li>
                    <li class="nav-item ">
                        <div class="dropdown ">
                            <x-nav-link
                                class="px-5 dropdown-toggle drop-link a-nav a-nav2 {{ request()->is('lainnya') ? 'active' : '' }}"
                                href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                DIREKTORI
                            </x-nav-link>
                            <ul class="dropdown-menu">

                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/alumni">Direktori Alumni</a>
                                </li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/tendik">Direktori Tenaga
                                        Pendidik</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="dropdown a-nav">
                            <x-nav-link
                                class="px-5 dropdown-toggle drop-link a-nav a-nav2 {{ request()->is('lainnya') ? 'active' : '' }}"
                                href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                GALERI
                            </x-nav-link>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="/album">Galeri Foto</a></li>
                            </ul>
                        </div>
                    </li>
                    </li>


                    {{-- <li class="nav-item">
                        <x-nav-link href="/berita"
                            class="nav-link {{ request()->is('berita') ? 'active' : '' }} px-5 a-nav">
                            BERITA</x-nav-link>
                    </li> --}}

                    <li class="nav-item ">
                        <div class="dropdown a-nav">
                            <x-nav-link
                                class="px-5 dropdown-toggle drop-link a-nav a-nav2 {{ request()->is('lainnya') ? 'active' : '' }}"
                                href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                KEGIATAN
                            </x-nav-link>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="article-berjualan">Kegiatan
                                        UKS</a></li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="article-marketing">Kegiatan
                                        OSIS</a></li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="article-bisnis">Kegiatan
                                        Pramuka</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <div class="dropdown a-nav">
                            <x-nav-link
                                class="px-5 dropdown-toggle drop-link a-nav a-nav2 {{ request()->is('lainnya') ? 'active' : '' }}"
                                href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                LAINNYA
                            </x-nav-link>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="article-berjualan">Tips
                                        Berjualan</a></li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="article-marketing">Trik
                                        Marketing</a></li>
                                <li class="nav-item"><a class="dropdown-item a-nav2" href="article-bisnis">Cuan Di
                                        Sekolah</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>