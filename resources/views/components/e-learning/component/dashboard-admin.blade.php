<div class="container-fluid bg-content mb-4">
    <!-- Small boxes (Stat box) -->
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="">
                <div class="info-box">
                    <span class="info-box-icon bg-info"><i class="fa-solid fa-user-large"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Siswa</span>
                        <span class="info-box-number">
                            @if ($siswa)
                            {{ $siswa }}
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
                <div class="info-box ">
                    <span class="info-box-icon bg-success "><i class="fa-solid fa-user-tie"></i></span>
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
                <div class="info-box ">
                    <span class="info-box-icon bg-warning"><i class="fa-solid fa-user-graduate"></i></span>
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
    
    {{-- row --}}
    <div class="row mt-5">
        <div class="col">
            {{-- /kalender --}}
            <div class="col-12">
                <x-hr-gradient>
                    Kalender Kegiatan
                </x-hr-gradient>
            </div>
            <div class="col-12">
                <x-calender :event="$event" />
            </div>
        </div>
    </div>
    {{-- /.row --}}

</div>