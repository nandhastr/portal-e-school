<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid mt-5 " style="height: 100vh">
        <x-hr-gradient>
            Dikrektori Guru dan Tenaga Kependidikan
        </x-hr-gradient>
        @if ($guru && $karyawan -> isNotEmpty())
        <div class="row mt-3">
            <div class="col-6 ">
                <div class="row justify-content-center">
                    @if($guru)
                    @foreach ($guru as $gr)
                    <div class="card card-body h-100 border border-secondary rounded-0 m-3">
                        <div class="row no-gutters ">
                            <div class="col-md-4 px-4">
                                @if(!empty($gr->gambar))
                                <img src="{{ asset('assets/img/guru/' . $gr->gambar) }}"
                                    class="img-fluid  border border-info img-circle  m-2">
                                @else
                                <img src="{{ asset('assets/img/guru/default.png') }}"
                                    class="img-fluid  border border-info img-circle  m-2">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class=" pt-2 pb-2">
                                    <dl class="row">
                                        <dt class="col-sm-5">Nama Lengkap</dt>
                                        <dd class="col-sm-7">{{ $gr->nama }}</dd>
                                        <dt class="col-sm-5">Jenis Kelamin</dt>
                                        <dd class="col-sm-7">{{ $gr->genre }}</dd>
                                        <dt class="col-sm-5">Tempat lahir</dt>
                                        <dd class="col-sm-7">{{ $gr->tempat_lahir }}</dd>
                                        <dt class="col-sm-5">Status</dt>
                                        <dd class="col-sm-7">{{ $gr->status }}</dd>
                                        <dt class="col-sm-5">Jabatan</dt>
                                        <dd class="col-sm-7">{{ $gr->jabatan }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Tidak ada data</p>
                    @endif
                </div>
            </div>
            <div class="col-6 ">
                <div class="row justify-content-center">
                    @if($karyawan)
                    @foreach ($karyawan as $kr)
                    <div class="card card-body h-100 border border-secondary rounded-0 m-3">
                        <div class="row no-gutters">
                            <div class="col-md-4 px-4">
                                @if(!empty($kr->gambar))
                                <img src="{{ asset('assets/img/karyawan/' . $kr->gambar) }}"
                                    class="img-fluid border border-success img-circle m-2">
                                @else
                                <img src="{{ asset('assets/img/karyawan/default.png') }}"
                                    class="img-fluid border border-success img-circle m-2">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class=" pt-2 pb-2">
                                    <dl class="row">
                                        <dt class="col-sm-5">Nama Lengkap</dt>
                                        <dd class="col-sm-7">{{ $kr->nama }}</dd>
                                        <dt class="col-sm-5">Jenis Kelamin</dt>
                                        <dd class="col-sm-7">{{ $kr->genre }}</dd>
                                        <dt class="col-sm-5">Tempat lahir</dt>
                                        <dd class="col-sm-7">{{ $kr->tempat_lahir }}</dd>
                                        <dt class="col-sm-5">Status</dt>
                                        <dd class="col-sm-7">{{ $kr->status }}</dd>
                                        <dt class="col-sm-5">Jabatan</dt>
                                        <dd class="col-sm-7">{{ $kr->jabatan }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <p>Tidak ada data</p>
                    @endif
                </div>
            </div>
        </div>
        @else
        <x-image-not-data></x-image-not-data>
        @endif

    </div>

    </x-main.tamplate-info>