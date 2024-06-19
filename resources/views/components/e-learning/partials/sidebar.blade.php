<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('/') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/avatar.png') }}" alt="" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">E-School</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="{{ route('/') }}" class="d-block">SMK PGRI Pamijahan Bogor</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                {{-- for elearning --}}
                {{-- <li class="nav-item menu-open">
                    <x-nav-link href="/" class="nav-link {{ request()->is('e-learning') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </x-nav-link>
                </li> --}}

                {{-- for portal --}}
                <li class="nav-item menu-open">
                    <x-nav-link href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </x-nav-link>
                </li>
                <li class="nav-item">
                    {{-- sidebar untuk elearning --}}
                    {{-- <x-nav-link href="/akademi" class="nav-link {{ request()->is('akademi') ? 'active' : '' }}">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <p>Akademi<i class="fas fa-angle-left right"></i></p>
                    </x-nav-link> --}}

                    {{-- sidebar portla --}}
                    <x-nav-link href="" class="nav-link {{ request()->is('akademi') ? 'active' : '' }}">
                        <i class="fa-regular fa-bookmark"></i>
                        <p class="text-lg fw-bold text-primary">Master Portal<i
                                class="fas fa-angle-left right text-lg"></i>
                        </p>
                    </x-nav-link>

                    {{-- side bar admin --}}
                    @if($user->role !== 'siswa' && $user->role !== 'guru')
                    <x-e-learning.component.menuside-admin></x-e-learning.component.menuside-admin>
                    @endif



                    {{-- isi side bar untuk user siswa dan guru --}}
                    {{-- ini side bar untuk siswa --}}
                    {{-- @if($user->role !== 'admin' && $user->role !== 'guru')
                    <x-e-learning.component.menuside-siswa></x-e-learning.component.menuside-siswa>
                    @endif --}}
                    {{-- side bar guru --}}
                    {{-- @if($user->role !== 'siswa' && $user->role !== 'admin')
                    <x-e-learning.component.menuside-guru></x-e-learning.component.menuside-guru>
                    @endif --}}
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>