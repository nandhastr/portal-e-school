<div>
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</div>
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
                                        <th>Penghargaa Diberikan Kepada</th>
                                        <th>Nama Penghargaan</th>
                                        <th>Detail</th>
                                        <th>Tanggal Diberikan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- {{ dd($kelas)}} --}}
                                    @if(!empty($reward))
                                    @foreach ($reward as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->siswa->user->name }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>{{ $row->tanggal_diterima }}</td>
                                        <td>
                                            <button class="btn bg-success btn-edit" data-toggle="modal"
                                                data-target="#modal-update_{{ $row->id }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></button>
                                            <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                                data-target="#modal-delete"><i class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <p>tidak ada kelas</p>
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
                    <h4 class="modal-title">Tambah Data Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="siswa">Penghargaan Diberikan Kepada</label>
                                <select name="siswa_id" id="siswa" class="form-control" required>
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($reward as $s)
                                    <option value="{{ $s->siswa->user->user_id }}">{{ $s->siswa->user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="judul">Nama Penghargaan</label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Detail</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                    required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_diterima">Tanggal Diberikan</label>
                                <input type="date" name="tanggal_diterima" id="tanggal_diterima" class="form-control"
                                    required>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Penghargaan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- {{ dd($kelas) }} --}}
    <!-- Modal Update -->
    @foreach ($reward as $row )
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="siswa">Penghargaan Diberikan Kepada</label>
                            <select name="siswa_id" id="siswa" class="form-control" required>
                                <option value="">Pilih Siswa</option>
                                @foreach ($reward as $s)
                                <option value="{{ $s->siswa->user->user_id }}">{{ $s->siswa->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Nama Penghargaan</label>
                            <input type="text" name="judul" value="{{ $row->judul }}" id="judul" class="form-control"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Detail</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                required>{{ $row->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_diterima">Tanggal Diberikan</label>
                            <input type="date" name="tanggal_diterima" value="{{ $row->tanggal_diberikan }}"
                                id="tanggal_diterima" class="form-control" required>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endforeach

    {{-- Modal delete --}}
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteSubject">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Kelas ini?</p>
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

</section>
@section('script')
{{-- cdn dataable --}}
<script src='https://cdn.datatables.net/2.0.8/js/dataTables.js'> </script>
<script>
    $(document).ready(function () {
        // datatabel
        new DataTable('#example');

        // script untuk kirim id ke modal
        // $('.btn-edit').click(function () {
        // var kelas_id = $(this).data('kelasid');
        // var tingkat_kelas = $(this).data('tingkat');
        // $('#kelas_id').val(kelas_id);
        // $('#tingkat_kelas').val(tingkat_kelas);
        // });
    });
</script>

@endsection