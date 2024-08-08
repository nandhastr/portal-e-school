<x-main.app class="navbar navbar-expand-lg ">
    {{-- container album --}}
    {{-- --}}
    <div class="container container-fluid mt-5" style="height: 100vh">
            <div class="col-12">
                <x-hr-gradient>
                    Galeri Foto
                </x-hr-gradient>
            </div>
        @if (empty($album))
        <x-image-not-data></x-image-not-data>
        @else
        <div class="row justify-content-center mt-3">
            <div class="card card-body card-info card-outline">
                <div class="row">
                    @if($album)
                    @foreach($album as $row)
                    <div class="col-sm-2">
                        <img src="{{ asset('assets/img/galeri/' . $row->url) }}" class="p-3 img-fluid mb-2 img-galeri"
                            alt="white sample" />
                        <a href="{{ asset('ssets/img/galeri/' . $row->url) }}" download="{{ $row->url }}"
                            class="  position-absolute" style="bottom: 10px; right: 10px;">
                            <i class="fa-solid fa-download"></i>
                        </a>
                    </div>
                    @endforeach
                    @else
                    Tidak ada data
                    @endif
                </div>
            </div>
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
        transform: scale(1.1);
    }
</style>