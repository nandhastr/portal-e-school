<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid mt-5 ">
        <div class="col-12">
        <x-hr-gradient>
            Informasi Seputar Siswa/i SMK PGRI PAMIJAHAN
        </x-hr-gradient>
    </div>
        contoh :
        <div class="row">
            <div class="col-6">
                prestasi akadmik
            </div>
            <div class="col-6">
                prestasi non akademik
            </div>
        </div>
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-12">
                <x-hr-gradient>
                    Siswa Berprestasi
                </x-hr-gradient>
            </div>
        </div>
        @if ($prestasi->isNotEmpty())
        <div class="row mt-3">
            @foreach ($prestasi as $win)
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card card-body p-3 card-outline card-success" style="width: 15rem;">
                    <img src="{{ asset('assets/img/siswa/' . $win->siswa->gambar) }}" style="height: auto;"
                        class="img-fluid img-circle">
                    <hr>
                    <div class="">
                        <h5>{{ $win->prestasi }} - {{ $win->tahun }}</h5>
                        <p class="card-text">
                        <div class="col-12">
                            Nama : {{ $win->siswa->nama }}
                        </div>
                        <div class="col-12">
                            Kelas : {{ $win->siswa->kelas }}
                        </div>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <x-image-not-data></x-image-not-data>
        @endif

    </div>
</x-main.app>