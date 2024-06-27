<x-main.app class="navbar navbar-expand-lg">
    <div class="marque">
        {{-- <x-marque></x-marque> --}}
    </div>
    <div class="container mt-5 mb-5 container-fluid">
        @if ($pengumuman && $pengumuman_terbaru)
        @if ($kepsek && $kepsek->isNotEmpty())
        <p>Data kepsek ditemukan</p>
        @endif
        <div class="row justify-content-center">
            <div class="col col-lg-3 col-md-12 col-sm-12  mb-4">
                <x-card-kepsek :kepsek="$kepsek"></x-card-kepsek>
                {{-- <x-profile-sekolah></x-profile-sekolah> --}}
            </div>

            <div class="col">
                <x-card-home class="card card-home ">
                    <h1 class="text-center">Pengumuman</h1>
                    @if($pengumuman_terbaru)
                    @if($pengumuman_terbaru->gambar)
                    <img src="{{ asset('assets/img/pengumuman/' . $pengumuman_terbaru->gambar) }}"
                        class="card-img-top mb-3 img-pengumuman " alt="{{ $pengumuman_terbaru->judul }}">
                    @endif
                    <h5 class="card-title fw-bold text-pengumuman p-3">{{ $pengumuman_terbaru->judul }}</h5>
                    <span class="p-3">Pelaksanaan acara :
                        @if ($pengumuman_terbaru->tanggal)
                        {{ $pengumuman_terbaru->tanggal }}
                        @else
                        -
                        @endif
                    </span>
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
                        alt="{{ $item->judul }}" style="width: auto;">
                    @else
                    tidak ada gambar
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->judul }}</h5>
                        <span>Pelaksanaan acara :
                            @if ($item->tanggal)
                            {{ $item->tanggal }}
                            @else
                            -
                            @endif
                        </span>
                        <hr>
                        <p class="card-text">{{ Str::limit($item->isi, 100) }}</p>
                        {{-- <a href="{{ route('announcement.show', $item->id) }}" class="btn btn-primary">Baca
                            Selengkapnya</a> --}}
                    </div>
                </x-card-home>
            </div>
            @endforeach
        </div>
        @else
        <x-image-not-data></x-image-not-data>
        @endif
    </div>
</x-main.app>