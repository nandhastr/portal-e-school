<x-card-home class="card card-home ">
    @if ($kepsek)
    <div class="gallery-item">
        <img src="{{ asset('assets/img/guru/'. $kepsek->gambar) }}"
            class="card-img-top img-fluid img-kepsek gallery-img" alt="...">
    </div>
    <div class="card-body ">
        <h5 class="card-title ">Kepala Sekolah</h5>
        <p class="card-text ">
            <b>{{$kepsek->nama}}</b>
        </p>
    </div>
    @else
    tidak ada data
    @endif
</x-card-home>