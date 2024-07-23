<x-main.app class="navbar navbar-expand-lg fixed-top">
    <div class="container container-fluid mt-5" style="height: 100vh">
        <x-hr-gradient>
            Program Magang
        </x-hr-gradient>
        @if ($program )
        <div class="row mt-3">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="content-container">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        @if ($program)
                        <img src="{{ asset('assets/img/profil-sekolah/'. $program->gambar) }}"
                            class="card-img-top img-pengumuman mb-2" alt="...">

                        @else
                        Data Kosong
                        @endif
                    </div>
                    @if($program)
                    <div class="content-program">
                        <div class="content-text">
                            @php
                            // Ambil konten dan pecah menjadi array kata
                            $words = explode(' ', $program->konten);
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
                            <p class="card-text text-justify">
                                {{ $paragraph }}
                            </p>
                            @endforeach
                        </div>
                    </div>
                    @else
                    <p>Tidak ada Detail</p>
                    @endif
                </div>
            </div>
        </div>

        @else
        <x-image-not-data></x-image-not-data>
        @endif
    </div>



</x-main.app>