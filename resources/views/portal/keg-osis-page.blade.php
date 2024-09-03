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
                            @else
                            <img src="{{ asset('assets/img/kegiatan/default.jpeg') }}" class="card-img-top mb-3 img-pengumuman " alt="{{ $pengumuman_osis_terbaru->judul}}">
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
                    <div class="row">
                            <div class="col-6">
                                @if($item->gambar)
                                <img src="{{ asset('assets/img/kegiatan/' . $item->gambar) }}" class="card-img-top img-thumbnail"
                                    alt="{{ $item->judul }}" style="width: auto;">
                                @else
                                <img src="{{ asset('assets/img/kegiatan/default.jpeg') }}" class="card-img-top img-thumbnail"
                                    alt="{{ $item->judul }}" style="width: auto;">
                                @endif
                            </div>
                            <div class="col-6">
                                <h5 class="card-title fw-bold">{{ $item->judul }}</h5><br>
                                <span>
                                    @if ($item->tanggal)
                                    {{ $item->tanggal }}
                                    @else
                                    -
                                    @endif
                                </span>
                            </div>
                            <button type="button" class="btn btn-primary mx-auto d-block" data-toggle="modal"
                                data-target="#modal-detail-{{ $item->id }}">Lihat</button>
                    </div>
                </x-card-home>
            </div>
            @endforeach
        </div>
        @else
        <x-image-not-data></x-image-not-data>
        @endif
    </div>
    {{-- modal --}}
    @foreach($osis as $item)
    <!-- Modal Detail osis -->
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
                    <img src="{{ asset('assets/img/kegiatan/' . $item->gambar) }}" class="img-fluid img-thumbnail mb-3"
                        alt="{{ $item->judul }}" style="width:auto">
                        <a href="{{ asset('assets/img/kegiatan/' . $item->gambar) }}" download="{{ $item->judul }}"
                            class="btn btn-info position-absolute" style="bottom: 10px; right: 10px;">
                            <i class="fa-solid fa-download"></i>
                        </a>
                    @else
                    <img src="{{ asset('assets/img/kegiatan/default.jpeg') }}" class="card-img-top img-thumbnail" alt="{{ $item->judul }}"
                        style="width: auto;">
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
                    <p>{{ $item->deskripsi }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-main.app>