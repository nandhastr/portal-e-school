{{ $slot }}
{{-- content --}}
<!-- Content Wrapper. Contains page content -->
<div class="fixed top-bar ">
    <div class="container-fluid pl-5">
        <div class="row justify-content-center align-items-center">
            <nav class="navbar navbar-expand-lg">
                <div class="row">
                    <div class="col-auto">
                        <x-image-link src="{{ asset('assets/img/smklogo.png') }}" class="img-banner"
                            style="width: 5rem; height: auto;">
                        </x-image-link>
                    </div>
                    <div class="col">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <span class="nav-link">Email: email@gmail.com</span>
                                <span class="nav-link">Telp: +6241434234</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <a class="navbar-brand text-white text-xl" href="#">E-School</a> --}}

            </nav>
        </div>
    </div>
</div>