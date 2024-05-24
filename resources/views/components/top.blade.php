{{ $slot }}
{{-- content --}}
<!-- Content Wrapper. Contains page content -->
<div class="p-2 fixed top-bar ">
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