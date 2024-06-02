<!-- Small boxes (Stat box) -->
{{-- <div class="container-fluid"> --}}
    <div class="row mb-2">
        <div class="col-lg-8 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border">
                <div class="inner">
                    <x-image-link src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-md p-1 img-fluid">
                    </x-image-link>
                    <h3 class="text-light fs-1 fs-md-2 fs-lg-3 fs-xl-4 text-capitalize">Selamat Datang, {{ $name }}</h3>
                    <span class="text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Deleniti culpa
                        sequi
                        veritatis commodi
                        deserunt magni vel consectetur pariatur quis? Architecto.</span>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Profil <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border">
                <div class="inner">
                    <h3 class="text-info">Pencapaianku</h3>
                    <div class="row justify-content-center align-items-center">
                        <div class="col-6 text-center">
                            <i class="fa-solid fa-book-open text-info "></i><br>
                            <span class=" text-dark">Kelasku : XI A</span>
                        </div>
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
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-md-6 col-12">
            <!-- small box -->
            <div class="small-box border ">
                <div class="inner">
                    <h3 class="text-info">Kegiatan yang di ikuti</h3>
                    <span class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur mollitia
                        odio
                        ullam omnis perspiciatis asperiores hic tempore cum quo tenetur?</span>
                </div>
                <div class="row ">
                    {{-- <span class="text-dark"><i class="fa-solid fa-file-pen"></i>Extrakulikuler</span> --}}
                    <div class="col-6">
                        <ul>
                            <li> Futsal</li>
                        </ul>

                    </div>
                    <div class="col-6">
                        <ul>
                            <li> Sepak Bola</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li> Basket</li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <ul>
                            <li>BuluTangkis</li>
                        </ul>
                    </div>
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
                    @foreach ($penghargaan as $award )
                    <div class="col-6">
                        <ul>
                            <li>{{ $award->title }}</li>
                        </ul>
                    </div>
                    @endforeach
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
    {{--
</div> --}}