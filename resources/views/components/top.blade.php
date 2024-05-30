{{ $slot }}
{{-- content --}}
<!-- Content Wrapper. Contains page content -->
<div class="p-2 fixed top-bar ">
    <div class="container-fluid pl-5">
        <div class="row justify-content-center align-items-center">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand text-white text-xl" href="#">E-School</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <span class="nav-link">Email: email@gmail.com</span>
                            <span class="nav-link">Telp: +6241434234</span>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<div id="theme-container ">
    <div class="row">
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