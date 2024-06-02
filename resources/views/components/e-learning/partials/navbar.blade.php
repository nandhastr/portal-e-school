<x-partials.header></x-partials.header>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <h6 class="nav-link">Hallo, {{ Auth::user()->name }}</h6>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                {{-- nav rata kanan --}}
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown4" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h5 class="fw-bold text-danger">
                                    {{ Auth::user()->name }}
                                </h5>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown4">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile')
                                    }}</a>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link class="dropdown-item" :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </li>
                    </div>
                </div>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->