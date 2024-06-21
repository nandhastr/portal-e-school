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
                                        <th>Kategori</th>
                                        <th>gambar</th>
                                        <th>Konten</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($profil))
                                    @foreach ($profil as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kategori }}</td>
                                        <td>
                                            <img src="{{ asset('assets/img/profil-sekolah/' . $row->gambar) }}"
                                                style="width: 50px; height: auto;" class="img-fluid">
                                        </td>
                                        <td>{{ $row->konten }}</td>
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
    </div>

    {{-- Modal Create --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-profil-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Tambah Data Untuk</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="">Pilih untuk </option>
                                @foreach ((['sejarah','program_sekolah']) as $row )
                                <option value="{{ $row }}">{{ $row }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="konten">Isi Konten</label>
                            <textarea name="konten" id="konten" class="form-control" cols="30" rows="10" required
                                placeholder="Enter Isi Kontent"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($profil as $row)
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
                    <form action="{{ route('data-profil-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                placeholder="Pilih Gambar">
                            @if ($row->gambar)
                            <img src="{{ asset('assets/img/profil-sekolah/' . $row->gambar) }}"
                                style="width: 30px; height: auto;" class="img-fluid mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kategori">Data untuk :</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="{{ $row->kategori }}" selected>{{ $row->kategori }}</option>
                                @foreach (['sejarah', 'program_sekolah'] as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="konten">Isi Konten</label>
                            <textarea name="konten" id="konten" cols="30" rows="10" class="form-control" required
                                placeholder="Enter Isi Konten">{{ $row->konten }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- Modal delete --}}
    @foreach ($profil as $row)
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
                    <form action="{{ route('data-profil-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Ini?</p>
                            <h5>Kategori</h5>
                            <h6>"<i>{{ $row->kategori }}</i>"</h6>
                            <input type="hidden" name="id" id="delete_subject_id">
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