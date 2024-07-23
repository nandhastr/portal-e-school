{{-- content --}}
<!-- Content Wrapper. Contains page content -->

<div class="fixed top-bar">
    <div class="container-fluid pl-5" id="homefirst">
        <div class="row justify-content-center align-items-center">
            <nav class="navbar navbar-expand-lg">
                @foreach ($komponen as $row )
                <div class="row justify-content-center align-items-center d-flex w-100">
                    <div class="col-auto">
                        <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}"
                            style="width: 100px; height: auto;" class="img-fluid">
                    </div>
                    <div class="col-auto">
                        <h4 class="text-white fw-bold">{{ $row->instansi }}</h4>
                        <h5 class="text-gold fw-bold">Terakreditasi : {{ $row->akreditas }}</h5>
                        <span>{{ $row->alamat }}</span>
                    </div>
                    <div class="col">
                        <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a href="mailto:smkpgripamijahan707@gmail.com" class="nav-link text-lg fw-bold">
                                    <i class="fa-regular fa-envelope"></i> {{ $row->email }}
                                </a>
                                <span class="nav-link text-lg fw-bold">
                                    <i class="fa-solid fa-phone"></i> {{ $row->telepon }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </nav>
        </div>
    </div>
</div>