<x-main.app class="navbar navbar-expand-lg">
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="container mt-5 mb-5 container-fluid">
        <div class="col-12">
            <x-hr-gradient>
                Informasi Kegiatan OSIS
            </x-hr-gradient>
        </div>
        @if ($pengumuman_osis_terbaru && $osis->IsNotEmpty())
        <div class="row justify-content-center mt-3">
            <div class="col">
                <x-card-home class="card-body card-info card-outline card-home ">
                    <h1 class="text-center">Pengumuman</h1>
                    @if($pengumuman_osis_terbaru)
                    @if($pengumuman_osis_terbaru->gambar)
                    <img src="{{ asset('assets/img/kegiatan/' . $pengumuman_osis_terbaru->gambar) }}"
                        class="card-img-top mb-3 img-pengumuman " alt="{{ $pengumuman_osis_terbaru->judul }}">
                    @endif
                    <h5 class="card-title fw-bold text-pengumuman p-3">{{ $pengumuman_osis_terbaru->judul }}</h5>
                    <span class="p-3">Pelaksanaan acara :
                        @if ($pengumuman_osis_terbaru->tanggal)
                        {{ $pengumuman_osis_terbaru->tanggal }}
                        @else
                        -
                        @endif
                    </span>
                    <hr>
                    <p class="card-text p-3">
                        {{ Str::limit($pengumuman_osis_terbaru->deskripsi, 1000) }}
                    </p>
                    @else
                    <p>Tidak ada pengumuman terbaru.</p>
                    @endif
                </x-card-home>
            </div>
            <div class="col-12 mt-3">
                <x-hr-gradient>
                    Riwayat Pengumuman
                </x-hr-gradient>
            </div>
            @foreach($osis as $item)
            <div class="col col-lg-3 col-md-4 col-12 mb-4">
                <x-card-home class="card card-body card-info card-outline card-home">
                    @if($item->gambar)
                    <img src="{{ asset('assets/img/kegiatan/' . $item->gambar) }}" class="card-img-top img-thumbnail"
                        alt="{{ $item->judul }}" style="width: auto;">
                    @else
                    tidak ada gambar
                    @endif
                    <div class="">
                        <h5 class="card-title fw-bold">{{ $item->judul }}</h5><br>
                        <span>Pelaksanaan acara :
                            @if ($item->tanggal)
                            {{ $item->tanggal }}
                            @else
                            -
                            @endif
                        </span>
                        <hr>
                        <p class="card-text">{{ Str::limit($item->deskripsi, 100) }}</p>
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