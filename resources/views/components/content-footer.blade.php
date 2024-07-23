</div>
<!-- Main Footer -->
{{-- @php
    dd($komponen)
@endphp --}}
<footer class="mb-0" style="margin-top: 6em; margin-bottom:0px;">
    <div class="footer-menu">
        <div class="container-fluid py-2">
            @if(!empty($komponen))
                @foreach ($komponen as $row)
                <div class="row m-4 row-footer ">
                    <div class="col col-footer col-md-3 text-light  text-center">
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}" style="width: 50%; height: auto;"
                            class="img-fluid">
                         </div>
                        <p>{{$row->instansi}}</p>
                        <p>Terakreditasi <br> " {{ $row->akreditas }} " <br> Yang Menjadikannya Sekolah Favorit</p>
                    </div>
                    <div class="col col-footer mt-4 col-md-3 text-light ">
                        <h5>Kontak Kami :</h5>
                        <p>
                            {{$row->alamat}}<br>
                            Telp: {{$row->telepon}}<br>
                            Email: {{$row->email}}
                        </p>
                    </div>
                    <div class="col col-footer mt-4 col-md-3 text-white">
                        <h5>Link Terkait :</h5>
                        <ul class="list-unstyled ">
                            <li><a class="text-light a-foot" href="#homefirst">Beranda</a></li>
                            <li><a class="text-light a-foot" href="{{ route('about')}}">Tentang Kami</a></li>
                            <li><a class="text-light a-foot" href="{{ route('program')}}">Program</a></li>
                            <li><a class="text-light a-foot" href="#homesecond">Pengumuman</a></li>
                        </ul>
                    </div>
                    <div class="col col-footer mt-4 col-md-3 text-light pr-4">
                        <h5>Media Sosial :</h5>
                        <p>Ikuti kami di media sosial:</p>
                        <ul class="list-unstyled">
                            <li><a target="_blank" class="text-light a-foot" href="{{$row->link_fb}}">Facebook</a></li>
                            <li><a target="_blank" class="text-light a-foot" href="{{$row->link_ig}}">Instagram</a></li>
                            <li><a target="_blank" class="text-light a-foot" href="{{$row->link_yt}}">YouTube</a></li>
                        </ul>
                    </div>
                </div>
                @endforeach
            @else
                <x-image-not-data/>
            @endif
        </div>
    </div>
    <div class="copyright text-center mb-0">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center align-items-center">
                    <small class="text-center ">Copyright &copy; 2024 - <?= date('Y'); ?> <a href="" class="text-gray fw-bold">{{$row->instansi}}</a></small>
                </div>
            </div>
        </div>
    </div>
</footer>