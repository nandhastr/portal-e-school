</div>
<!-- Main Footer -->
<footer class="mb-0" style="margin-top: 6em; margin-bottom:0px;">
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <div class="footer-menu">
        <div class="container-fluid py-2">
            <div class="row m-4 row-footer">
                <div class="col col-footer col-md-3 text-light">
                    <x-image-link src="{{ asset('assets/img/smklogo.png') }}" class="img-thumbnail" style="width: 8em">
                    </x-image-link>
                    <p>Sekolah Menengah Kejuruan Terakreditasi "B" Yang Menjadikannya Sekolah Favorit</p>
                </div>
                <div class="col col-footer col-md-3 text-light">
                    <h5>Kontak Kami</h5>
                    <p>
                        Jl. Pendidikan No. 1<br>
                        Kota Pendidikan, 12345<br>
                        Telp: (021) 123-4567<br>
                        Email: info@sekolah.ac.id
                    </p>
                </div>
                <div class="col col-footer col-md-3 text-light">
                    <h5>Link Terkait</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Beranda</a></li>
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Program</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Kontak</a></li>
                    </ul>
                </div>
                <div class="col col-footer col-md-3 text-light pr-4">
                    <h5>Media Sosial</h5>
                    <p>Ikuti kami di media sosial:</p>
                    <ul class="list-unstyled">
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">YouTube</a></li>
                    </ul>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div class="copyright text-center mb-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center">Copyright &copy; 2024 <a href="">Nama Sekolah.</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- FullCalendar -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fullcalendar/main.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<!-- Ekko Lightbox -->
<script src="{{ asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
<!-- Filterizr -->
<script src="{{ asset('assets/plugins/filterizr/jquery.filterizr.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- Custom Script -->
<script src="{{ asset('assets/js/script.js') }}"></script>

@yield('script')
</body>

</html>