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
                    <div style="overflow-x:auto; overflow-y:auto; max-height:38em;">
                        <div class="card-body">
                            {{-- tabel mata pelajaran dashboard admin --}}

                            <table id="example" class="display table-hover text-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kelas</th>
                                        <th>Ruangan</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($kelas)}} --}}
                                    @if(!empty($ruang))
                                    @foreach ($ruang as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kelas->tingkat }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>
                                            {{-- tombol edit --}}
                                            <button class="btn bg-success btn-edit" data-toggle="modal"
                                                data-target="#modal-update_{{ $row->id }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></button>
                                            {{-- tombol delete --}}
                                            <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                                data-target="#modal-delete_{{ $row->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <p>tidak ada ruangan</p>
                                    @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    \
    {{-- Modal Create --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Ruang Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ruang-store') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="">Ruang</label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Ruangan"
                                value="{{old('name')}}">
                        </div>
                        <div class="modal-body">
                            <label for="">Kelas</label>
                            <select name="id_kelas" id="" class="form-control" value="{{old('id_kelas')}}">
                                <option value="">Pilih Tingkat Kelas</option>
                                @foreach ($kelas as $row )
                                <option value="{{ $row->id }}">{{$row->tingkat}}</option>

                                @endforeach
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($kelas) }} --}}
    @foreach ($ruang as $row)
    <!-- Modal Update -->
    <div class="modal fade" id="modal-update_{{ $row->id }}" tabindex="-1" role="dialog"
        aria-labelledby="modal-update_{{ $row->id }}Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-update_{{ $row->id }}Label">Ubah Data Ruang Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('ruang-update', ['id' => $row->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label for="">Ruang</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Ruangan"
                            value="{{ $row->nama }}">
                    </div>
                    <div class="modal-body">
                        <label for="">Kelas</label>
                        <select name="id_kelas" class="form-control">
                            <option value="{{ $row->kelas->id }}">{{ $row->kelas->tingkat }}</option>
                            @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->tingkat }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($ruang as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ruang-delete', ['id' => $row->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Kelas ini?</p>
                            <h5>Nama Ruangan : <i>{{$row->nama}}</i></h5>
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

        // // script untuk kirim id ke modal
        // $('.btn-edit').click(function () {
        // var kelas_id = $(this).data('kelasid');
        // var tingkat_kelas = $(this).data('tingkat');
        // $('#kelas_id').val(kelas_id);
        // $('#tingkat_kelas').val(tingkat_kelas);
        // });
    });
</script>

@endsection