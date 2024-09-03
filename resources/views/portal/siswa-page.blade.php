<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid mt-5 ">
        <div class="col-12">
            <x-hr-gradient>
                Informasi Seputar Prestasi Siswa/i SMK PGRI PAMIJAHAN
            </x-hr-gradient>
        </div>
        <div class="row">
            <div class="col">
                <h3 class="mb-3">Prestasi Akademik</h3>
                @if ($prestasi_akademik->isNotEmpty())
                <div class="row mt-3">
                    @foreach ($prestasi_akademik as $win)
                    <div class="col-lg-3 col-md-3 col-sm-12 mb-4">
                        <div class="card card-body p-3 card-outline card-success  align-items-center"
                            style="height: 25em;">
                            @if(!empty($win->siswa->gambar))
                            <img src="{{ asset('assets/img/siswa/' . $win->siswa->gambar) }}"
                                style="width: 150px; height: auto;" class="img-fluid img-circle">
                            @else
                            <img src="{{ asset('assets/img/siswa/default.png') }}" style="width: 150px; height: auto;"
                                class="img-fluid mt-2">
                            @endif
                            <hr>
                            <div class="">
                                <div class="row ">
                                    <h5 class="text-center">{{ $win->prestasi }} </h5>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Nama
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->siswa->nama }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Kelas
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->siswa->kelas }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Kategori
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->kategori }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Tahun
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->tahun }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <x-image-not-data></x-image-not-data>
                @endif

            </div>
        </div>
        <hr class="my-4" style="border: 2px solid #007bff;">
        <div class="row">
            <div class="col">
                <h3 class="mb-3">Prestasi non Akademik</h3>
                @if ($prestasi_non_akademik->isNotEmpty())
                <div class="row mt-3">
                    @foreach ($prestasi_non_akademik as $win)
                    <div class="col-lg-3 col-md-3 col-sm-12 mb-4 ">
                        <div class="card card-body p-3 card-outline card-success align-items-center"
                            style="height: 25em;">
                            @if(!empty($win->siswa->gambar))
                            <img src="{{ asset('assets/img/siswa/' . $win->siswa->gambar) }}"
                                style="width: 150px; height: auto;" class="img-fluid img-circle">
                            @else
                            <img src="{{ asset('assets/img/siswa/default.png') }}" style="width: 150px; height: auto;"
                                class="img-fluid mt-2">
                            @endif
                            <hr>
                            <div class="">
                                <div class="row ">
                                    <h5 class="text-center">{{ $win->prestasi }} </h5>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Nama
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->siswa->nama }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Kelas
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->siswa->kelas }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Kategori
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->kategori }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        Tahun
                                    </div>
                                    <div class="col-1">
                                        :
                                    </div>
                                    <div class="col-7">
                                        {{ $win->tahun }}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <x-image-not-data></x-image-not-data>
                @endif
            </div>
        </div>
    </div>
</x-main.app>