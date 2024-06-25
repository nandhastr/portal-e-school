<x-main.app class="navbar navbar-expand-lg">
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="container mt-5 mb-5 container-home">
        <div class="row justify-content-center">
            <div class="col col-lg-3 col-md-12 col-sm-12  mb-4">

                <x-card-kepsek :kepsek="$kepsek"></x-card-kepsek>

                {{-- <x-profile-sekolah></x-profile-sekolah> --}}
            </div>
            <div class="col col-lg-9 col-md-12 col-sm-12  mb-4 col-wide">
                <x-card-home class="card card-home ">
                    <h1 class="text-center ">Pengumuman</h1>
                    @if($pengumuman_terbaru)
                    @if($pengumuman_terbaru->gambar)
                    <img src="{{ asset('assets/img/pengumuman/' . $pengumuman_terbaru->gambar) }}"
                        class="card-img-top mb-3 img-pengumuman " alt="{{ $pengumuman_terbaru->judul }}">
                    @endif

                    <h5 class="card-title fw-bold text-pengumuman p-3">{{ $pengumuman_terbaru->judul }}</h5>
                    <p class="card-text p-3">
                        {{ Str::limit($pengumuman_terbaru->isi, 1000) }}
                    </p>

                    @else
                    <p>Tidak ada pengumuman terbaru.</p>
                    @endif
                </x-card-home>
            </div>
            <div class="col-12">
                <x-hr-gradient>
                    Catatan Pengumuman
                </x-hr-gradient>
            </div>
            @foreach($pengumuman as $item)
            <div class="col col-lg-3 col-md-4 col-12 mb-4">
                <x-card-home class="card card-home">
                    @if($item->gambar)
                    <img src="{{ asset('assets/img/pengumuman/' . $item->gambar) }}" class="card-img-top img-thumbnail"
                        alt="{{ $item->judul }}" style="width:10rem;">
                    @else
                    <img src="{{ asset('assets/img/default.png') }}" class="card-img-top img-thumbnail"
                        alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->judul }}</h5>
                        <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                        <a href="" class="btn btn-primary">Read More</a>
                    </div>
                </x-card-home>
            </div>
            @endforeach
        </div>
    </div>
</x-main.app>

<style>
    .container-home {
        background-color: #fff !important;
    }
</style>