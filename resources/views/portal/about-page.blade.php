<x-main.app class="navbar navbar-expand-lg">
    <div class="container container-fluid mt-5" style="height: 100vh">

        <div class="row">
            <div class="col-12">
                <x-hr-gradient>
                    Tentang Sekolah
                </x-hr-gradient>
            </div>
        </div>
        <div class="row">
            <img src="{{ asset('assets/img/profil-sekolah/'. $about->gambar) }}"
                class="card-img-top img-pengumuman" alt="...">
        </div>
        <div class="row">
            @if (empty($about))
            <x-image-not-data></x-image-not-data>
            @else
            <div class="col-lg-8 col-md-8 col-sm-12 mt-3 p-4">
                    @if ($about)
                    @endif
                        <h5 class="card-title  fw-bold text-pengumuman mb-3">Sejarah Singkat SMK PGRI PAMIJAHAN</h5>
                        @if ($about)
                        @php
                        // Ambil konten dan pecah menjadi array kata
                        $words = explode(' ', $about->konten);
                        $paragraphs = [];
                        $temp = [];

                        // Loop melalui kata-kata dan buat paragraf
                        foreach ($words as $index => $word) {
                        $temp[] = $word;
                        if (($index + 1) % 110 == 0 || $index == count($words) - 1) {
                        $paragraphs[] = implode(' ', $temp);
                        $temp = [];
                        }
                        }
                        @endphp

                        @foreach ($paragraphs as $paragraph)
                        <p class="p-about card-text text-justify mt-3 py-3">
                            {{ $paragraph }}
                        </p>
                        @endforeach
                        @else
                        Tidak ada Detail
                        @endif
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 p-4">
                <h5 class="fw-bold py-3">Info Lokasi</h5>
                <p class="p-map"><x-map :map="$map"/></p>
            </div>
            @endif
        </div>
    </div>

</x-main.app>