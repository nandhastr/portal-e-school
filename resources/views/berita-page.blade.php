<x-main.app class="navbar navbar-expand-lg ">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">

            <div class="col col-lg-3 col-md-12 col-sm-12 mb-4">
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
            <div class="col col-lg-6 col-md-12 col-sm-12 mb-4 col-wide">
                {{-- <h1 class="text-center pb-1">Berita</h1> --}}
                <x-card-home class="card-berita">

                    <img src="{{ asset('assets/img/school.png') }}" class="card-img-top img-berita img-banner3 ml-"
                        alt="...">

                    <div class="card-body ">
                        <h5 class="card-title fw-bold text-berita">judul Berita</h5>
                        <p class="card-text text-berita">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iste et exercitationem nesciunt
                            assumenda consequuntur error quia totam molestiae. In recusandae sed, quisquam accusamus
                            consequatur aliquam distinctio quo porro rerum eaque eligendi reprehenderit voluptatibus,
                            blanditiis voluptatum nemo vel.
                        </p>
                        <a href="#" class="btn btn-outline-info">Read More </a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-2 col-md-12 col-sm-12 mb-4">
                <x-card-home class="card-berita">
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
            <div class="col col-lg-12 col-md-12 col-sm-12 mb-4">
                <x-card-home class="card-berita">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Youtube</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-12 col-sm-12 mb-4">
                <x-card-home class="card-berita">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Tranding topik</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-12 col-sm-12 mb-4">
                <x-card-home class="card-berita">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Artikel Terkini</h5>
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