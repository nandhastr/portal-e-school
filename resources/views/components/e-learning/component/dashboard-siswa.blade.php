{{-- dashbioard elearning --}}
{{-- <div class="container-fluid">
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
        <div class="col-lg-6 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border ">
                <div class="inner">
                    <h3 class="text-info">Kegiatan yang di ikuti</h3>
                </div>
                <div class="row ">
                    @if(!empty($kegiatan))

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
</div> --}}

<div class="container-fluid bg-content mb-4">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa-solid fa-user-large"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Info Kegiatan Yang di Share</span>
                        <span class="info-box-number">
                            @if ($kegiatan)
                            {{ $kegiatan }}
                            @else
                            tidak ada data
                            @endif
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="">
                <div class="info-box bg-success">
                    <span class="info-box-icon "><i class="fa-solid fa-user-tie"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Guru</span>
                        <span class="info-box-number">
                            @if ($guru)
                            {{ $guru }}
                            @else
                            tidak ada data
                            @endif
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="">
                <div class="info-box bg-gradient-warning">
                    <span class="info-box-icon text-dark"><i class="fa-solid fa-user-graduate"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Alumni</span>
                        <span class="info-box-number">
                            @if ($alumni)
                            {{ $alumni }}
                            @else
                            tidak ada data
                            @endif
                        </span>
                    </div>
                </div>
            </a>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
</div>