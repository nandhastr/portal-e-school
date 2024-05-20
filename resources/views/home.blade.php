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
    <x-partials.navbar class="navbar navbar-expand-lg " style="background-image: linear-gradient(to left, blue, white)">
    </x-partials.navbar>

    <div class="container pr-4">
        <div class="row justify-content-center">
            <div class="col col-md-3 ml-3">
                <x-card-home>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-md-3 ml-3 card-tengah">
                <x-card-home class="mx-auto">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-md-3 ml-3">
                <x-card-home>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-md-3 ml-3">
                <x-card-home>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-md-3 ml-3">
                <x-card-home>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
            <div class="col col-md-3 ml-3">
                <x-card-home>
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's
                            content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </x-card-home>
            </div>
        </div>
    </div>

</x-main.app>