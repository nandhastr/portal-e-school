<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary fixed-top elevation-4 ">
    <!-- Brand Logo -->
    <a href="{{ route('/') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/avatar.png') }}" alt="" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">E-School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info">
                <a href="{{ route('/') }}" class="d-block">SMK PGRI Pamijahan Bogor</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <x-nav-link href="/e-learning" class="nav-link {{ request()->is('e-learning') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    <x-nav-link href="/akademi" class="nav-link {{ request()->is('akademi') ? 'active' : '' }}">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <p>
                            Akademi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </x-nav-link>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <x-nav-link href="/all-class"
                                class="nav-link {{ request()->is('all-class') ? 'active' : '' }}">
                                <i class="fa-solid fa-swatchbook"></i>
                                <p>Semua Kelas</p>
                            </x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link href="/my-class"
                                class="nav-link {{ request()->is('my-class') ? 'active' : '' }}">
                                <i class="fa-regular fa-address-book"></i>
                                <p>Kelas Saya</p>
                            </x-nav-link>
                        </li>
                        <li class="nav-item">
                            <x-nav-link href="/ujian" class="nav-link {{ request()->is('ujian') ? 'active' : '' }}">
                                <i class="fa-regular fa-pen-to-square"></i>
                                <p>Ujian</p>
                            </x-nav-link>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>