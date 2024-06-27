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
                                    <th>foto</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jenias Kelamin</th>
                                    <th>Tempat lahir</th>
                                    <th>tanggal lahir</th>
                                    <th>Alamat</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($siswa))
                                @foreach ($siswa as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/siswa/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->kelas }}</td>
                                    <td>{{ $row->genre }}</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                    <td>{{ $row->alamat }}</td>
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
                                <p>tidak ada data siswa</p>
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
                    <h4 class="modal-title">Tambah Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-siswa-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar"
                                required value="{{old('file')}}">
                        </div>
                        <div class="form-group">
                            <label for="nis">nis</label>
                            <input type="text" name="nis" id="nis" class="form-control" placeholder="Enter nis" required
                                value="{{old('nis')}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter nama"
                                required value="{{old('nama')}}">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                placeholder="Enter tempat " required value="{{old('tempat_lahir')}}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                placeholder="Enter tanggal " required value="{{old('tanggal_lahir')}}">
                        </div>
                        <div class="form-group">
                            <label for="genre">Jenis Kelamin</label>
                            <select class="form-control" name="genre">
                                <option value="">Jenis Kelamin</option>

                                <option value="laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" name="kelas">
                                <option>Pilih Kelas</option>
                                @foreach (['X','XI','XII'] as $kls )
                                <option value="{{ $kls }}">{{$kls}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required
                                value="{{old('alamat')}}" placeholder="Enter Alamat"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($siswa as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-siswa-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar"
                                value="{{old('file')}}">

                        </div>
                        <div class="form-group">
                            <label for="nis">nis</label>
                            <input type="text" name="nis" id="nis" class="form-control" placeholder="Enter nis" required
                                value="{{$row->nis}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter nama"
                                required value="{{$row->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                placeholder="Enter Tempat lahir " required value="{{ $row->tempat_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                placeholder="Enter tanggal lahir " required value="{{ $row->tanggal_lahir }}">
                        </div>
                        <div class="form-group">
                            <label for="genre">Jenis Kelamin</label>
                            <select class="form-control" name="genre">
                                @foreach (['laki-laki','perempuan'] as $jns )
                                <option value="{{ $jns }}" {{ $row->genre == $jns ? 'selected' : '' }}>{{ $jns }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" name="kelas">
                                <option>{{$row->kelas}}</option>
                                @foreach (['X','XI','XII'] as $kls )
                                <option value="{{ $kls }}" {{$row->kelas == $kls ? 'selected': ''}}>{{$kls}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required
                                value="{{old('alamat')}}" placeholder="Enter Alamat">{{ $row->alamat }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($siswa as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus siswan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-siswa-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus siswa Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Foto Siswa</th>
                                    <td>
                                        <img src="{{ asset('assets/img/siswa/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td>{{ $row->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $row->nama }}</td>
                                </tr>
                                <tr>
                                    <th>kelas</th>
                                    <td>{{ $row->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal lahir</th>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $row->alamat }}</td>
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