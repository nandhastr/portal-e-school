<x-main.app>
    <x-slot name="title">{{ $title }}</x-slot>
    {{-- content --}}
    <!-- Content Wrapper. Contains page content -->
    <div class="bg-primary p-2">
        <div class="container-fluid pl-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-2 col-sm-2 brand text-white text-xl">E-School</div>
                <div class="col-md-2 col-sm-4 ms-auto text-white">
                    <span>Email: email@gmail.com</span>
                </div>
                <div class="col-md-6 col-sm-4 text-white">
                    <span>Telp: +6241434234</span>
                </div>
            </div>
        </div>
    </div>
    <div id="theme-container">
        <div class="row ">
            <div class="col ">
                <x-image-link src="{{ asset('assets\dist\img\photo4.jpg') }}" class="img-banner">
                </x-image-link>
            </div>
            <div class="col-md-9 d-flex justify-content-center align-items-center img-banner2">
                <x-image-link src="{{ asset('assets\img\student.png') }}" class=" img-banner3">
                </x-image-link>
            </div>
        </div>
    </div>
    <x-carousel-banner></x-carousel-banner>
    <x-partials.navbar class="navbar navbar-expand-lg ">
    </x-partials.navbar>

    <div class="container pr-4 mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col col-lg-3 col-md-12 col-sm-12 ml-3 mb-4">
                <x-card-home class="card-home">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Profile Sekolah</h5>
                        <p class="card-text">
                            <li class="mt-1"><a href="">Sejarah Sekolah</a></li>
                            <li class="mt-1"><a href="">Visi & Misi</a></li>
                            <li class="mt-1"><a href="">Struktur Organisasi</a></li>
                            <li class="mt-1"><a href="">Guru Dan Karyawan</a></li>
                            <li class="mt-1"><a href="">Program Sekolah</a></li>
                        </p>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-12 col-sm-12 ml-3 mb-4 col-wide">
                <h1 class="text-center pb-1">Pengumuman</h1>
                <x-card-home class="card-home">
                    <img src="{{ asset('assets/img/school.png') }}" class="card-img-top img-pengumuman" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-pengumuman">nama pengumuman</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste et exercitationem nesciunt
                            assumenda consequuntur error quia totam molestiae. In recusandae sed, quisquam accusamus
                            consequatur aliquam distinctio quo porro rerum eaque eligendi reprehenderit voluptatibus,
                            blanditiis voluptatum nemo vel.
                        </p>
                        <a href="#" class="btn btn-outline-info">Read More </a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-12 col-sm-12 ml-3 mb-4">
                <x-card-home class="card-home">
                    <img src="{{ asset('assets/img/user1.jpg') }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Kepala Sekolah</h5>
                        <p class="card-text">
                            <b>Nama Kepala sekolah</b>
                        </p>
                        <a href="#" class="btn btn-outline-info">Lihat Profile</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-12 col-md-12 col-sm-12 ml-3 mb-4">
                <x-card-home class="card-home">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-12 col-sm-12 ml-3 mb-4">
                <x-card-home class="card-home">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-12 col-sm-12 mb-4">
                <x-card-home class="card-home">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
        </div>
    </div>

</x-main.app>