<x-main.app class="navbar navbar-expand-lg">
    {{-- <x-slot name="title">{{ $title }}</x-slot> --}}
    <div class="container mt-5 mb-5 container-home">
        <div class="row justify-content-center">
            <div class="col col-lg-3 col-md-12 col-sm-12  mb-4">

                <x-card-kepsek></x-card-kepsek>

                {{-- <x-profile-sekolah></x-profile-sekolah> --}}
            </div>
            <div class="col col-lg-9 col-md-12 col-sm-12  mb-4 col-wide">
                <x-card-home class="card card-home ">
                    <h1 class="text-center ">Pengumuman</h1>
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
            <div class="col-12">
                <x-hr-gradient>
                    Pengumuman Terbaru
                </x-hr-gradient>
            </div>
            <div class="col col-lg-3 col-md-4 col-12 mb-4">
                <x-card-home class="card card-home ">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the
                            bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-lg-3 col-md-4 col-12 mb-4">
                <x-card-home class="card card-home ">
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
            <div class="col col-lg--3 col-md-4 col-12 mb-4">
                <x-card-home class="card card-home ">
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

<style>
    .container-home {
        background-color: #fff !important;
    }
</style>