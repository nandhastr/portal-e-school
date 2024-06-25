<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid " style="height: 100vh">
        <x-hr-gradient>
            Dikrektori Guru dan Tenaga Kependidikan
        </x-hr-gradient>
        <div class="row ">
            <div class="col-6">
                <div class="row justify-content-center">
                    @if($guru)
                    @foreach ($guru as $gr)
                    <div class="card h-100 border border-secondary rounded-0 mb-3">
                        <div class="row no-gutters ">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/img/guru/' . $gr->gambar) }}"
                                    class="img-fluid card-img border border-secondary rounded-0 m-2">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body pt-2 pb-2">
                                    <dl class="row">
                                        <dt class="col-sm-5">Nama Lengkap</dt>
                                        <dd class="col-sm-7">{{ $gr->nama }}</dd>
                                        <dt class="col-sm-5">Jenis Kelamin</dt>
                                        <dd class="col-sm-7">{{ $gr->genre }}</dd>
                                        <dt class="col-sm-5">Temmpat lahir</dt>
                                        <dd class="col-sm-7">{{ $gr->tempat_lahir }}</dd>
                                        <dt class="col-sm-5">Tanggal lahir</dt>
                                        <dd class="col-sm-7">{{ $gr->tanggal_lahir }}</dd>
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
                    <div class="card h-100 border border-secondary rounded-0 mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/img/karyawan/' . $kr->gambar) }}"
                                    class="img-fluid card-img border border-secondary rounded-0 m-2">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body pt-2 pb-2">
                                    <dl class="row">
                                        <dt class="col-sm-5">Nama Lengkap</dt>
                                        <dd class="col-sm-7">{{ $kr->nama }}</dd>
                                        <dt class="col-sm-5">Jenis Kelamin</dt>
                                        <dd class="col-sm-7">{{ $kr->genre }}</dd>
                                        <dt class="col-sm-5">Temmpat lahir</dt>
                                        <dd class="col-sm-7">{{ $kr->tempat_lahir }}</dd>
                                        <dt class="col-sm-5">Tanggal lahir</dt>
                                        <dd class="col-sm-7">{{ $kr->tanggal_lahir }}</dd>
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
    </div>

    </x-main.tamplate-info>