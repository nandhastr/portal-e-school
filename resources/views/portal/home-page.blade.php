<x-top :komponen="$komponen"></x-top>


<x-main.app class="navbar navbar-expand-lg" id="homesecond">
    <div class="marque">
        {{-- <x-marque></x-marque> --}}
    </div>
    {{-- {{dd($event)}} --}}

    <div class="container mt-5 mb-5 container-fluid">
        @if ($pengumuman && $pengumuman_terbaru)
        @if ($kepsek && $kepsek)
        @endif
        <div class="row justify-content-center">
            <div class="row justify-content-center">
                <div class="col col-lg-3 col-md-12 col-sm-12  mb-4">
                    <x-card-kepsek :kepsek="$kepsek"></x-card-kepsek>
                    {{-- <x-profile-sekolah :test="$jfgd"></x-profile-sekolah> --}}
                </div>
                {{-- pengumuman --}}
                <div class="col-12 col-lg-9 col-md-12 col-sm-12">
                    <x-card-home class="card  card-home card-outline card-primary">
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
                                <span class="p-3">Tempat : {{ $pengumuman_terbaru->tempat }}</span><br>
                                <span class="p-3">Tanggal : {{ $pengumuman_terbaru->tanggal }}</span><br>
                                <span class="p-3">Waktu : {{ $pengumuman_terbaru->waktu }}</span><br>
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
        <div class="row justify-content-center mt-5">
            {{-- kalender --}}
            <div class="col-12">
                <x-hr-gradient>
                    Kalender Kegiatan
                </x-hr-gradient>
            </div>
            <div class="col-12">
                <x-calender :event="$event" />
            </div>
        </div>
        <div class="col-12">
            <x-hr-gradient>
                Riwayat Pengumuman
            </x-hr-gradient>
        </div>
        <div class="row mt-5">
           @foreach($pengumuman as $item)
        <div class="col col-lg-2 col-md-4 col-12 mb-4 ">
            <x-card-home class="card-home card-body card-outline card-primary">
                <div class="card-header ">
                    @if($item->gambar)
                    <img src="{{ asset('assets/img/pengumuman/' . $item->gambar) }}" class="card-img-top img-thumbnail"
                        alt="{{ $item->judul }}" style="width: auto; height: 10rem">
                    @else
                    tidak ada gambar
                    @endif
                    <hr>
                    <div class="mt-3">
                        <h5 class="card-title text-center fw-bold">{{ $item->judul }}</h5><br><br>
                        <hr>
                        <button type="button" class="btn btn-primary mx-auto d-block" data-toggle="modal"
                            data-target="#modal-detail-{{ $item->id }}">Lihat</button>
                    </div>
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

    {{-- modal --}}
    @foreach($pengumuman as $item)
    <!-- Modal Detail Pengumuman -->
    <div class="modal fade" id="modal-detail-{{ $item->id }}" tabindex="-1"
        aria-labelledby="modal-detail-{{ $item->id }}-label" aria-hidden="true">
        <div class="modal-dialog modal-xm">
            <div class="modal-content">
                <div class="modal-header">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body d-flex justify-content-center align-items-center">
                    @if($item->gambar)
                    <img src="{{ asset('assets/img/pengumuman/' . $item->gambar) }}" class="img-fluid img-thumbnail mb-3"
                        alt="{{ $item->judul }}" style="width:auto">
                        <a href="{{ asset('assets/img/pengumuman/' . $item->gambar) }}" download="{{ $item->judul }}"
                            class="btn btn-info position-absolute" style="bottom: 10px; right: 10px;">
                            <i class="fa-solid fa-download"></i>
                        </a>
                    @else
                    <p>Tidak ada gambar</p>
                    @endif
                </div>
                <div class="text-center">
                    <h5>{{ $item->judul }}</h5>
                    <p><strong>Tanggal:</strong> {{ $item->tanggal }}</p>
                    <p><strong>Waktu:</strong> {{ $item->waktu }}</p>
                    <p><strong>Tempat:</strong> {{ $item->tempat }}</p>
                    <hr>
                    <h6>Detail :</h6>
                </div>
                <div class="text-justify text-start m-3">
                    <p>{{ $item->keterangan }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach 
</x-main.app>
<x-content-footer :komponen="$komponen"></x-content-footer>