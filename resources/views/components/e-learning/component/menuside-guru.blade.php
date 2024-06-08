<ul class="nav nav-treeview">
    <li class="nav-item">
        {{-- <x-nav-link href="/all-class" class="nav-link {{ request()->is('all-class') ? 'active' : '' }}">
            <i class="fa-solid fa-swatchbook"></i>
            <p>side admin</p>
        </x-nav-link> --}}
        {{--
    <li
        class="nav-item {{ request()->is('admin/subject*', 'admin/class*', 'admin/students*', 'admin/qna-ans*') ? 'menu-is-opening menu-open' : '' }}">
        <a href="#"
            class="nav-link {{ request()->is('admin/subject*', 'admin/class*', 'admin/students*', 'admin/qna-ans*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Master i cla-uploadss="right fas fa-angle-left"></i></p>
        </a>
        <ul class="nav nav-treeview"> --}}
            <li class="nav-item">
                <a href="/materi-upload-page"
                    class="nav-link {{ request()->is('materi-upload-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Materi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/tugas-upload-page" class="nav-link {{ request()->is('tugas-upload-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tugas</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/soal-upload-page" class="nav-link {{ request()->is('soal-upload-page') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Soal</p>
                </a>
            </li>
            {{-- <li class="nav-item">
                <a href="/ujian-upload-page" class="nav-link {{ request()->is('ujian-upload-page') ? 'active' : '' }}">
                    <i class="fas fa-file nav-icon"></i>
                    <p>Ujian</p>
                </a>
            </li> --}}
            <li class="nav-item">
                <a href="/guru/review-ujian-page"
                    class="nav-link {{ request()->is('guru/review-ujian-page*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Hasil Ujian</p>
                </a>
            </li>
        </ul>
        {{--
    </li> --}}

    </li>
</ul>