<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid " style="height: 100vh">
        <x-hr-gradient>
            Informasi Seputar Siswa/i SMK PGRI PAMIJAHAN
        </x-hr-gradient>
        <div class="row">
            <div class="col col-lg-6 col-md-6 col-12">
                <x-hr-gradient>
                    Siswa Berprestasi
                </x-hr-gradient>
            </div>
        </div>
        <div class="row">
            @foreach ($prestasi as $win)
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="card p-3" style="width: 18rem;">
                    <img src="{{ asset('assets/img/siswa/' . $win->siswa->gambar) }}" style=" height: auto;"
                        class="img-fluid">
                    <hr>
                    <div class="card-body">
                        <h5>{{ $win->prestasi }} - {{$win->tahun}}</h5>
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
        {{-- end row --}}
    </div>
</x-main.app>