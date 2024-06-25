<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-create">
                                Tambah Data
                            </button>
                        </h3>

                        <div class="card-tools">
                            {{-- <div class="input-group mt-2">
                                <form action="{{ route('subjectDashboard')}}" method="GET">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control float-right"
                                            placeholder="Search" value="{{ $request->get('search') }}">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body " style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        {{-- tabel mata pelajaran dashboard admin --}}

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Judul Pengumuman</th>
                                    <th>Tanggal Edar</th>
                                    <th>Isi Pengumuman</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($pengumuman))
                                @foreach ($pengumuman as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/pengumuman/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->isi }}</td>
                                    <td>
                                        <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                            data-target="#modal-update_{{ $row->id }}"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                            data-target="#modal-delete_{{ $row->id }}"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>tidak ada pengumuman</p>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-pengumuman-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                placeholder="Pilih tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Pengumuman</label>
                            <textarea name="judul" id="judul" cols="30" class="form-control" required
                                placeholder="Enter Judul Pengumuman"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Pengumuman</label>
                            <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" required
                                placeholder="Enter Isi Pengumuman"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Pengumuman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($pengumuman as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-pengumuman-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                placeholder="Pilih Gambar">
                            @if ($row->gambar)
                            <img src="{{ asset('assets/img/pengumuman/' . $row->gambar) }}"
                                style="width: 30px; height: auto;" class="img-fluid mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control"
                                placeholder="Pilih tanggal" required value="{{ $row->tanggal }}">
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul Pengumuman</label>
                            <textarea name="judul" id="judul" cols="30" class="form-control" required
                                placeholder="Enter Judul Pengumuman">{{$row->judul}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="isi">Isi Pengumuman</label>
                            <textarea name="isi" id="isi" class="form-control" cols="30" rows="10" required
                                placeholder="Enter Isi Pengumuman">{{$row->isi}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Pengumuman</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($pengumuman as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pengumumann</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-pengumuman-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Pengumuman Ini?</p>
                            <h5>Detail Data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        <img src="{{ asset('assets/img/pengumuman/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Judul Pengumuman</th>
                                    <td>{{ $row->judul }}</td>
                                </tr>
                                <tr>
                                    <th>isi Pengumuman</th>
                                    <td>{{ $row->isi }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</section>
@section('script')
{{-- cdn dataable --}}
<script src='https://cdn.datatables.net/2.0.8/js/dataTables.js'> </script>
<script>
    $(document).ready(function () {
        // datatabel
        new DataTable('#example');
    });
</script>

@endsection