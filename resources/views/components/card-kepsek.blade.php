
<div class="card card-home card-info card-outline p-4">
    @if ($kepsek)
        <div class="box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/img/guru/'. $kepsek->gambar) }}"
                    alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{$kepsek->nama}}</h3>
            <p class="text-muted text-center">{{$kepsek->jabatan}}</p>
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>NIP </b> <a class="float-right">{{$kepsek->nip}}</a>
                </li>
                <li class="list-group-item">
                    <b>Jenis Kelamin</b> <a class="float-right">{{ $kepsek->genre }}</a>
                </li>
                <li class="list-group-item">
                    <b>Tempat lahir</b> <a class="float-right">{{ $kepsek->tempat_lahir }}</a>
                </li>
            </ul>
            {{-- <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-sm"><b>Follow</b></button> --}}
        </div>
    @else
    tidak ada data
    @endif
    {{-- size foto kepsek 128x128 --}}
</div>


