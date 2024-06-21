<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-12">
            <!-- small box -->
            <div class="small-box border">
                <div class="row">

                    <div class="col-auto">
                        <div class="inner">
                            <x-image-link src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class=" p-1 img-fluid "
                                style="width: 8em">
                            </x-image-link>
                        </div>
                    </div>
                    <div class="col">
                        <h3 class="text-light text-wrap fs-1 fs-md-2 fs-lg-3 fs-xl-4 text-capitalize py-2">Selamat
                            Datang, {{
                            Auth::user()->name }}
                        </h3>
                    </div>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Profil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-4 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border">
                <div class="inner">
                    <h3 class="text-info">Pencapaianku</h3>
                    <div class="row justify-content-center align-items-center">
                        @foreach($siswa as $s)
                        <div class="col-6 text-center">
                            <i class="fa-solid fa-book-open text-info "></i><br>
                            <span class=" text-dark">kelasku : {{ $s->kelas_sekarang }}</span>
                        </div>
                        @endforeach
                        <div class="col-6 text-center">
                            <i class="fa-solid fa-certificate text-info "></i><br>
                            <span class=" text-dark">Sertifikat</span>
                        </div>
                        <div class="col-6 text-center">
                            <span class="text-info text-lg fw-bold">12</span><br>
                            <span class=" text-dark">Kompetisi diikuti</span>
                        </div>
                        <div class="col-6 text-center">
                            <span class="text-info text-lg fw-bold">12</span><br>
                            <span class=" text-dark">Acara diikuti</span>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border ">
                <div class="inner">
                    <h3 class="text-info">Kegiatan yang di ikuti</h3>
                </div>
                <div class="row ">
                    @if(!empty($kegiatan))
                    {{-- {{ dd($kegiatan) }} --}}
                    @foreach ($kegiatan as $row )
                    <div class="col-6">
                        <ul>
                            <li>{{ $row->kegiatan }}</li>
                        </ul>
                    </div>
                    @endforeach
                    @else
                    <p>Belum ada kegiatan Yang Diikuti</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border">
                <div class="inner">
                    <h3 class="text-info">Penghargaan</h3>
                </div>
                <div class="row ">
                    @if(!empty($penghargaan))
                    {{-- {{ dd($penghargaan) }} --}}
                    @foreach ($penghargaan as $award )
                    <div class="col-6">
                        <ul>
                            <li>{{ $award->judul }}</li>
                        </ul>
                    </div>
                    @endforeach
                    @else
                    <p>Belum ada penghargaan</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-12">
            <!-- small box -->
            <div class="small-box border">
                <div class="inner">
                    <h3 class="text-info">Magang</h3>
                    <span class="text-dark">Kamu Belum Pernah Melakukan Magang .</span>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Sertifikat <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>