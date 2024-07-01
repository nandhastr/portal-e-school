<x-top :komponen="$komponen"></x-top>
<x-main.app class="navbar navbar-expand-lg">
    <div class="marque">
        {{-- <x-marque></x-marque> --}}
    </div>

    <div class="container mt-5 mb-5 container-fluid">
        @if ($pengumuman && $pengumuman_terbaru)
        @if ($kepsek && $kepsek)
        @endif
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col col-lg-3 col-md-12 col-sm-12  mb-4">
                    <x-card-kepsek :kepsek="$kepsek"></x-card-kepsek>
                    {{-- <x-profile-sekolah></x-profile-sekolah> --}}
                </div>
                {{-- pengumuman --}}
                <div class="col-12 col-lg-9 col-md-12 col-sm-12">
                    <x-card-home class="card card-home ">
                        <h1 class="text-center">Pengumuman</h1>
                        @if($pengumuman_terbaru)
                        @if($pengumuman_terbaru->gambar)
                        <img src="{{ asset('assets/img/pengumuman/' . $pengumuman_terbaru->gambar) }}"
                            class="card-img-top mb-3 img-pengumuman " alt="{{ $pengumuman_terbaru->judul }}">
                        @endif
                        <h5 class="card-title fw-bold text-pengumuman p-3">{{ $pengumuman_terbaru->judul }}</h5>
                        <h6 class="p-3">Pelaksanaan acara :</h6>
                        <div class="row">
                            <div class="col-6">
                                <span class="p-3">Tempat :
                                    @if ($pengumuman_terbaru->tempat)
                                    {{ $pengumuman_terbaru->tempat }}
                                    @else
                                    -
                                    @endif
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="p-3">Tanggal :
                                    @if ($pengumuman_terbaru->tanggal)
                                    {{ $pengumuman_terbaru->tanggal }}
                                    @else
                                    -
                                    @endif
                                </span>
                            </div>
                            <div class="col-6">
                                <span class="p-3">Waktu :
                                    @if ($pengumuman_terbaru->waktu)
                                    {{ $pengumuman_terbaru->waktu }}
                                    @else
                                    -
                                    @endif
                                </span>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text p-3">
                            {{ Str::limit($pengumuman_terbaru->keterangan, 1000) }}
                        </p>
                        @else
                        <p>Tidak ada pengumuman terbaru.</p>
                        @endif
                    </x-card-home>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            {{-- kalender --}}
            <div class="col-12">
                <x-hr-gradient>
                    Kalender Kegiatan
                </x-hr-gradient>
            </div>
            <div class="col-12">
                <x-calender />
            </div>
        </div>
        <div class="col-12">
            <x-hr-gradient>
                Riwayat Pengumuman
            </x-hr-gradient>
        </div>
        <div class="row">
            @foreach($pengumuman as $item)
            <div class="col col-lg-3 col-md-4 col-12 mb-4">
                <x-card-home class="card card-home">
                    @if($item->gambar)
                    <img src="{{ asset('assets/img/pengumuman/' . $item->gambar) }}" class="card-img-top img-thumbnail"
                        alt="{{ $item->judul }}" style="width: auto; height:20rem">
                    @else
                    tidak ada gambar
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $item->judul }}</h5><br>
                        <span>Pelaksanaan acara :</span><br>
                        <span>Tempat : {{ $item->tempat }}</span><br>
                        <span>Tanggal : {{ $item->tanggal }}</span><br>
                        <span>Waktu : {{ $item->waktu }}</span><br>

                        <hr>
                        <p class="card-text">{{ Str::limit($item->keterangan, 100) }}</p>
                        {{-- <a href="{{ route('announcement.show', $item->id) }}" class="btn btn-primary">Baca
                            Selengkapnya</a> --}}
                    </div>
                </x-card-home>
            </div>
            @endforeach
        </div>
    </div>
    @else
    <x-image-not-data></x-image-not-data>
    @endif
    </div>
</x-main.app>