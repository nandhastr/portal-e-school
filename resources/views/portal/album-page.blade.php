<x-main.app class="navbar navbar-expand-lg ">
    {{-- container album --}}
    {{-- --}}
    <div class="container container-fluid mt-5 mb-4" style="height: 100vh">
        <div class="col-12 mb-4">
            <x-hr-gradient>
                Galeri Foto
            </x-hr-gradient>
        </div>
        @if (empty($album))
        <x-image-not-data></x-image-not-data>
        @else
        <div class="row justify-content-center mt-3 mx-2">
            @if($album)
            @foreach($album as $row)
            <div class="col-md-2 col-sm-6 mb-2">
                <div class="card card-body card-outline border border-info">
                    <img src="{{ asset('assets/img/galeri/' . $row->url) }}"
                        class="  img-fluid mb-1 img-galeri card-img-top" alt="Gambar Galeri" style="height:10em; " />
                    <a href="{{ asset('assets/img/galeri/' . $row->url) }}" download="{{ $row->url }}"
                        class="position-absolute btn-download" style="bottom: 10px; right: 10px;">
                        <i class="fa-solid fa-download"></i>
                    </a>
                </div>
            </div>
            @endforeach
            @else
            <x-image-not-data></x-image-not-data>
            @endif
        </div>
        @endif
    </div>
</x-main.app>

<style>
    .img-galeri {
        object-fit: cover;
        transition: transform 0.5s, box-shadow 0.5s;
    }

    .img-galeri:hover {
        box-shadow: 3px 3px 6px #000 !important;
        transform: scaleX(1.1);
    }

    .btn-download::hover {
        box-shadow: 3px 3px 6px #000 !important;
    }
</style>