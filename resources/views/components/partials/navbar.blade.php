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
                            Home
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="/e-learning"
                            class="nav-link {{ request()->is('e-learning') ? 'active' : '' }} px-5 a-nav">E-Learning
                        </x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="/album"
                            class="nav-link {{ request()->is('album') ? 'active' : '' }} px-5 a-nav">
                            Album Foto</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="/alumni"
                            class="nav-link {{ request()->is('alumni') ? 'active' : '' }} px-5 a-nav">
                            Alumni</x-nav-link>
                    </li>
                    <li class="nav-item">
                        <x-nav-link href="/berita"
                            class="nav-link {{ request()->is('berita') ? 'active' : '' }} px-5 a-nav">
                            Berita</x-nav-link>
                    </li>

                    <li class="nav-item ">
                        <div class="dropdown a-nav">
                            <x-nav-link
                                class="px-5 dropdown-toggle drop-link a-nav a-nav2 {{ request()->is('lainnya') ? 'active' : '' }}"
                                href="lainnya" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                lainnya
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