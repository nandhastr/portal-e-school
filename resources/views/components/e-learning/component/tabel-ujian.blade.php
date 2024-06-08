<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-create-ujian">
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
                    <div class="card-body">
                        {{-- tabel mata pelajaran dashboard admin --}}

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tipe Ujan</th>
                                    <th>Judul</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Kelas</th>
                                    <th>Waktu Mulai</th>
                                    <th>Waktu Selesai</th>
                                    <th>Durasi</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($ujian))
                                @foreach ($ujian as $row)
                                {{-- {{ dd($row) }} --}}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->type }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>@if ($row->materi)
                                        {{ $row->materi->mata_pelajaran }}
                                        @else
                                        tidak ditemukan
                                        @endif</td>
                                    <td>
                                        @if ($row->kelas)
                                        {{ $row->kelas->tingkat }} {{ $row->kelas->nama }}
                                        @else
                                        Belum ditentukan
                                        @endif
                                    </td>
                                    <td>{{ $row->waktu_mulai }}</td>
                                    <td>{{ $row->waktu_selesai }}</td>
                                    <td>{{ $row->durasi }}</td>
                                    <td>
                                        <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                            data-target="#modal-update"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                            data-target="#modal-delete"><i class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>tidak ada mata pelajaran</p>
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Create Ujian -->
    <div class="modal fade" id="modal-create-ujian">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Ujian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="createUjianForm">
                        @csrf
                        <div class="modal-body">
                            <label for="type">Tipe Ujian</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">UTS/UAS/UN</option>
                                <option value="">UTS</option>
                                <option value="">UAS</option>
                                <option value="">UN</option>
                            </select>
                            <label for="judul">Judul Materi</label>
                            <textarea name="" id="" cols="30" rows="4" class="form-control" required></textarea>
                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">Mata Pelajaran</option>
                                <option value="">UmtkTS</option>
                                <option value="">indo</option>
                                <option value="">sunda</option>
                            </select>
                            <label for="">Ruang</label>
                            <label for="kelas">Kelas</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">A/B/C</option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" class="form-control"
                                required>
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="form-control"
                                required>
                            <label for="durasi">Durasi</label>
                            <input type="text" name="durasi" id="durasi" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal update --}}
    <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Data Ujian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="createUjianForm">
                        @csrf
                        <div class="modal-body">
                            <label for="type">Tipe Ujian</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">UTS/UAS/UN</option>
                                <option value="">UTS</option>
                                <option value="">UAS</option>
                                <option value="">UN</option>
                            </select>
                            <label for="judul">Judul Materi</label>
                            <textarea name="" id="" cols="30" rows="4" class="form-control" required></textarea>
                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">Mata Pelajaran</option>
                                <option value="">UmtkTS</option>
                                <option value="">indo</option>
                                <option value="">sunda</option>
                            </select>
                            <label for="">Ruang</label>
                            <label for="kelas">Kelas</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">A/B/C</option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" class="form-control"
                                required>
                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" class="form-control"
                                required>
                            <label for="durasi">Durasi</label>
                            <input type="text" name="durasi" id="durasi" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal delete --}}
    <div class="modal fade" id="modal-delete">
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
                            <p>Apakah Anda yakin ingin menghapus Ujian ini?</p>
                            <input type="hidden" name="id" id="delete_subject_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
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
    });
</script>

@endsection