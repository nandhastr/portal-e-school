<x-main.app class="navbar navbar-expand-lg ">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col col-lg-3 col-md-12 col-sm-12 mb-4">
                <x-profile-sekolah></x-profile-sekolah>
            </div>
            <div class="col col-lg-9 col-md-12 col-sm-12 mb-4 col-wide">
                <x-card-home class="card card-berita">
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

            <div class="col col-lg-12 col-md-12 col-sm-12 mb-4">
                <x-card-home class="card card-berita">
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
                <x-card-home class="card card-berita">
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
                <x-card-home class="card card-berita">
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