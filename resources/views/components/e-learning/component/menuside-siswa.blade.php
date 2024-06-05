<ul class="nav nav-treeview">
    <li class="nav-item">
        <x-nav-link href="/all-class" class="nav-link {{ request()->is('all-class') ? 'active' : '' }}">
            <i class="fa-solid fa-swatchbook"></i>
            <p>Kelas Saya</p>
        </x-nav-link>
    </li>
    <li class="nav-item">
        <x-nav-link href="/ujian" class="nav-link {{ request()->is('ujian') ? 'active' : '' }}">
            <i class="fa-regular fa-pen-to-square"></i>
            <p>Ujian<i class="fas fa-angle-left right"></i></p>
        </x-nav-link>
        <ul class="nav nav-treeview px-4">
            <li class="nav-item">

                <div class="form-check">
                    <label class="form-check-label" for="uts">
                        <x-nav-link href="/uts" class="nav-link">
                            <i class="fa-solid fa-swatchbook px-2"></i>
                            <p>UTS</p>
                        </x-nav-link>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="uas">
                        <x-nav-link href="/uas" class="nav-link">
                            <i class="fa-solid fa-swatchbook px-2"></i>
                            <p>UAS</p>
                        </x-nav-link>
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label" for="un">
                        <x-nav-link href="/un" class="nav-link">
                            <i class="fa-solid fa-swatchbook px-2"></i>
                            <p>UN</p>
                        </x-nav-link>
                    </label>
                </div>

            </li>
        </ul>
    </li>
</ul>