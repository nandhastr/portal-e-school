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
                                    <th>Logo</th>
                                    <th>Nama Instansi Pendidikan</th>
                                    <th>terakreditas</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Youtube</th>
                                    <th>Twitter</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($komponen))
                                @foreach ($komponen as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                    <td>{{ $row->instansi }}</td>
                                    <td>{{ $row->akreditas }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->telepon }}</td>
                                    <td><a href="{{ $row->link_fb }}">{{ $row->link_fb }}</a></td>
                                    <td><a href="{{ $row->link_ig }}">{{ $row->link_ig }}</a></td>
                                    <td><a href="{{ $row->link_yt }}">{{ $row->link_yt }}</a></td>
                                    <td><a href="{{ $row->link_tw }}">{{ $row->link_tw }}</a></td>

                                    <td>
                                        <small>
                                            <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                                data-target="#modal-update_{{ $row->id }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                                data-target="#modal-delete_{{ $row->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </small>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>tidak ada data komponen</p>
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
                    <h4 class="modal-title">Tambah Data komponen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-komponenSekolah-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar_logo">Gambar logo</label>
                            <input type="file" name="gambar_logo" id="gambar_logo" class="form-control"
                                placeholder="Pilih Gambar_logo" required value="{{old('file')}}">
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" name="instansi" id="instansi" class="form-control"
                                placeholder="Enter instansi" required value="{{old('instansi')}}">
                        </div>
                        <div class="form-group">
                            <label for="akreditas">Akreditas</label>
                            <select name="akreditas" class="form-control">
                                <option>Terakreditas</option>
                                @foreach (['A','B','C','D','E'] as $ak)
                                <option value="{{$ak}}">{{$ak}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" required
                                value="{{old('alamat')}}" placeholder="Enter Alamat"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                                required value="{{old('email')}}">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="telepon" name="telepon" id="telepon" class="form-control"
                                placeholder="Enter telepon" required value="{{old('telepon')}}">
                        </div>
                        <div class="form-group">
                            <label for="link_fb">Facebook link</label>
                            <input type="text" name="link_fb" id="link_fb" class="form-control"
                                placeholder="Enter link facebook" value="{{old('link_fb')}}">
                        </div>
                        <div class="form-group">
                            <label for="link_ig">Instagram link</label>
                            <input type="text" name="link_ig" id="link_ig" class="form-control"
                                placeholder="Enter link instagram" value="{{old('link_ig')}}">
                        </div>
                        <div class="form-group">
                            <label for="link_yt">Youtube link</label>
                            <input type="text" name="link_yt" id="link_yt" class="form-control"
                                placeholder="Enter link Youtube" value="{{old('link_yt')}}">
                        </div>
                        <div class="form-group">
                            <label for="link_tw">Twitter link</label>
                            <input type="text" name="link_tw" id="link_tw" class="form-control"
                                placeholder="Enter link Twitter" value="{{old('link_tw')}}">
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($komponen as $row)
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
                    <form action="{{ route('data-komponenSekolah-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar_logo">Gambar logo</label>
                            <input type="file" name="gambar_logo" id="gambar_logo" class="form-control"
                                placeholder="Pilih Gambar_logo">
                        </div>
                        <div class="form-group">
                            <label for="instansi">Instansi</label>
                            <input type="text" name="instansi" id="instansi" class="form-control"
                                placeholder="Enter instansi" required value="{{ $row->instansi}}">
                        </div>
                        <div class="form-group">
                            <label for="akreditas">Akreditas</label>
                            <select name="akreditas" class="form-control">
                                @foreach ($komponen as $ak)
                                <option value="{{ $ak->akreditas }}" @if (old('komponen')==$ak->akreditas) selected
                                    @endif>{{ $ak->akreditas }}</option>
                                @endforeach
                                @foreach (['A','B','C','D','E'] as $akre)
                                <option value="{{$akre}}">{{$akre}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" required
                                placeholder="Enter Alamat">{{$row->alamat}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email"
                                required value="{{$row->email}}">
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="telepon" name="telepon" id="telepon" class="form-control"
                                placeholder="Enter telepon" required value="{{$row->telepon}}">
                        </div>
                        <div class="form-group">
                            <label for="link_fb">Facebook link</label>
                            <input type="text" name="link_fb" id="link_fb" class="form-control"
                                placeholder="Enter link facebook" value="{{$row->link_fb}}">
                        </div>
                        <div class="form-group">
                            <label for="link_ig">Instagram link</label>
                            <input type="text" name="link_ig" id="link_ig" class="form-control"
                                placeholder="Enter link instagram" value="{{$row->link_ig}}">
                        </div>
                        <div class="form-group">
                            <label for="link_yt">Youtube link</label>
                            <input type="text" name="link_yt" id="link_yt" class="form-control"
                                placeholder="Enter link Youtube" value="{{$row->link_yt}}">
                        </div>
                        <div class="form-group">
                            <label for="link_tw">Twitter link</label>
                            <input type="text" name="link_tw" id="link_tw" class="form-control"
                                placeholder="Enter link Twitter" value="{{$row->link_tw}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($komponen as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus komponenn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-komponenSekolah-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Logo</th>
                                    <td>
                                        <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Instansi</th>
                                    <td>{{ $row->instansi }}</td>
                                </tr>
                                <tr>
                                    <th>Terakreditas</th>
                                    <td>{{ $row->akreditas }}</td>
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