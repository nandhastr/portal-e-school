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
                    <div style="overflow-x:auto; overflow-y:auto;">
                        <div class="card-body">
                            {{-- tabel mata pelajaran dashboard admin --}}

                            <table id="example" class="display table-hover text-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>foto</th>
                                        <th>Nama</th>
                                        <th>Prestasi</th>
                                        <th>Tahun</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($prestasi))
                                    @foreach ($prestasi as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('assets/img/siswa/' . $row->siswa->gambar) }}"
                                                style="width: 50px; height: auto;" class="img-fluid">
                                        </td>
                                        <td>{{ $row->siswa->nama }}</td>
                                        <td>{{ $row->prestasi }}</td>
                                        <td>{{ $row->tahun }}</td>
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
                                    <p>tidak ada data prestasi</p>
                                    @endif
                                </tbody>
                            </table>

                        </div>
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
                    <h4 class="modal-title">Tambah Data prestasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-prestasi-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="siswa">Nama Siswa</label>
                            <select class="form-control" name="siswa_id">
                                <option>Pilih Nama Siswa</option>
                                @foreach ($siswa as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="YEAR" name="tahun" id="tahun" class="form-control"
                                placeholder="Enter tahun. example :2001" required value="{{old('tahun')}}">
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input type="text" name="prestasi" id="prestasi" class="form-control"
                                placeholder="Enter presatsi " required value="{{old('prestasi')}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($prestasi as $row)
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
                    <form action="{{ route('data-prestasi-update',['id'=>$row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="siswa">Nama Siswa</label>
                            <select class="form-control" name="siswa_id">
                                <option>Pilih Nama Siswa</option>
                                @foreach ($siswa as $sw)
                                <option value="{{ $sw->id }}" @if ($row->siswa_id == $sw->id) selected @endif>{{
                                    $sw->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="YEAR" name="tahun" id="tahun" class="form-control"
                                placeholder="Enter tahun. example :2001" required value="{{$row->tahun}}">
                        </div>
                        <div class="form-group">
                            <label for="prestasi">Prestasi</label>
                            <input type="text" name="prestasi" id="prestasi" class="form-control"
                                placeholder="Enter presatsi " required value="{{$row->prestasi}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($prestasi as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus prestasin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-prestasi-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Foto Siswa</th>
                                    <td> <img src="{{ asset('assets/img/siswa/' . $row->siswa->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid"></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $row->siswa->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Prestasi</th>
                                    <td>{{ $row->prestasi }}</td>
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