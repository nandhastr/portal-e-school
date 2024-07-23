<x-main.app class="navbar navbar-expand-lg">
    <div class="container container-fluid mt-5" style="height: 100vh">

        <div class="row">
            <div class="col-12">
                <x-hr-gradient>
                    Tentang Sekolah
                </x-hr-gradient>

            </div>
            @if (empty($about))
            <x-image-not-data></x-image-not-data>
            @else
            <div class="col mt-3">
                <div class=" p-3">
                    @if ($about)
                    <img src="{{ asset('assets/img/profil-sekolah/'. $about->gambar) }}"
                        class="card-img-top img-pengumuman" alt="...">
                    @endif
                        <h5 class="card-title fw-bold text-pengumuman">Tentang SMK PGRI PAMIJAHAN</h5>
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
                        <p class="card-text text-align-justify mt-4">
                            {{ $paragraph }}
                        </p>
                        @endforeach
                        @else
                        Tidak ada Detail
                        @endif
                    </div>
                    
            </div>
            @endif
        </div>

    </div>



</x-main.app>