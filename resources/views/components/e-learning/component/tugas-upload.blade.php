<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-auto">
                                <button type="button" class="btn btn-success btn-jawabanTugas">
                                    Jawaban Tugas Siswa
                                </button>
                            </div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-primary btn-upload" data-toggle="modal"
                                    data-target="#modal-create">
                                    Upload Tugas
                                </button>
                            </div>
                            <div class="col">
                                <button type="butto" class="btn btn-info btn-list-tugas">
                                    Lihat Data Tugas
                                </button>
                            </div>
                        </div>
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
                            {{-- tabel upload tugas untuk siswa --}}
                            <table id="example" class="display table-hover text-xs tbl-tugas"
                                style="width:100%; display: none">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Tugas di Upload</th>
                                        <th>Untuk Kelas</th>
                                        <th>File Materi</th>
                                        <th>Tanggal</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($tugas))
                                    @foreach ($tugas as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->materi->judul }}</td>
                                        <td>
                                            @if ($row->siswa->kelas)
                                            {{ $row->siswa->kelas->tingkat }} - {{ $row->siswa->kelas->nama }}
                                            @else
                                            Belum ditentukan
                                            @endif
                                        </td>
                                        <td><a href="blank" download="{{ $row->tugas->file_path }}">{{
                                                $row->tugas->file_path }}</a></td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                                data-target="#modal-update"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
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

                            {{-- tabel jwaban siswa --}}
                            <table id="example" class="display table-hover text-xs tbl-jawabanTugas"
                                style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>File Jawaban</th>
                                        <th>Nilai</th>
                                        <th>Jenis Tugas</th>
                                        <th>Tanggal</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($tugas))
                                    @foreach ($tugas as $row)
                                    @if (in_array($row->jenis, ['tugas']))
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->siswa->user->name }}</td>
                                        <td>
                                            @if ($row->kelas)
                                            {{ $row->kelas->tingkat }} {{ $row->ruangKelas->nama }}
                                            @else
                                            Belum ditentukan
                                            @endif
                                        </td>
                                        <td>{{ $row->materi->mapel->mata_pelajaran}}</td>
                                        <td><a href="blank" download="{{ $row->tugas->file_path }}">{{
                                                $row->tugas->file_path }}</a></td>
                                        <td>{{ $row->nilai }}</td>
                                        <td>{{$row->jenis}}</td>
                                        <td>{{ $row->created_at }}</td>
                                        <td>
                                            <a class="btn bg-info btn-create-nilai" href="#"
                                                data-id_siswa="{{ $row->siswa->id }}"
                                                data-id_materi="{{ $row->id_materi }}" data-jenis="{{ $row->jenis }}"
                                                data-id_ujian="{{ $row->id_ujian }}" data-id_tugas="{{ $row->id }}"
                                                data-id_kelas="{{ $row->kelas->id }}" data-toggle="modal"
                                                data-target="#modal-create-nilai">Nilai</a>
                                            <a class="btn bg-success btn-update-nilai" href="#"
                                                data-id_siswa="{{ $row->siswa->id }}"
                                                data-id_materi="{{ $row->id_materi }}" data-jenis="{{ $row->jenis }}"
                                                data-id_ujian="{{ $row->id_ujian }}" data-id_tugas="{{ $row->id }}"
                                                data-id_kelas="{{ $row->kelas->id }}" data-nilai="{{ $row->nilai }}"
                                                data-toggle="modal" data-target="#modal-update-nilai">Edit</a>
                                            <a class="btn bg-danger btn-delete-nilai" href="#"
                                                data-id_tugas="{{ $row->id }}" data-toggle="modal"
                                                data-target="#modal-delete-nilai">Delete</a>
                                        </td>
                                    </tr>
                                    @endif
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
    </div>
    {{-- modal upload tugas --}}
    {{-- Modal Create --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload Tugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="">
                        @csrf
                        <div class="modal-body">
                            <label for="">Mata Pelajaran</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                <option value="">mtk</option>
                                <option value="">indo</option>
                                <option value="">suna</option>
                            </select>
                            <label for="">Tingkat Kelas</label>
                            <select name="" id="" class="form-control">
                                <option value="">kelas :X/XI/XII</option>
                                <option value="">X</option>
                                <option value="">XI</option>
                                <option value="">XII</option>
                            </select>
                            <label for="">Ruang</label>
                            <select name="" id="" class="form-control">
                                <option value="">Ruang: A/B/C/
                                <option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                            <label for="">Pilih Tugas</label>
                            <input type="file" name="subject" placeholder="" class="form-control" required>
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
                    <h4 class="modal-title">Ubah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="">
                        @csrf
                        <div class="modal-body">
                            <label for="">Mata Pelajaran</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                <option value="">mtk</option>
                                <option value="">indo</option>
                                <option value="">suna</option>
                            </select>
                            <label for="">Tingkat Kelas</label>
                            <select name="" id="" class="form-control">
                                <option value="">kelas :X/XI/XII</option>
                                <option value="">X</option>
                                <option value="">XI</option>
                                <option value="">XII</option>
                            </select>
                            <label for="">Ruang</label>
                            <select name="" id="" class="form-control">
                                <option value="">Ruang: A/B/C/
                                <option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>
                            </select>
                            <label for="">Pilih Tugas</label>
                            <input type="file" name="subject" placeholder="" class="form-control" required>
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
                    <h4 class="modal-title">Hapus Tugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteSubject">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Tugas?</p>
                            <input type="hidden" name="id" id="delete_subject_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya !</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal penilaian tugas --}}
    <!-- Modal Create Nilai -->
    <div class="modal fade" id="modal-create-nilai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Beri Nilai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createNilaiForm" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="number" name="nilai" class="form-control" required>
                            </div>
                            <input type="hidden" name="id_siswa" id="id_siswa_create">
                            <input type="hidden" name="id_materi" id="id_materi_create">
                            <input type="hidden" name="jenis" id="jenis_create">
                            <input type="hidden" name="id_ujian" id="id_ujian_create">
                            <input type="hidden" name="id_tugas" id="id_tugas_create">
                            <input type="hidden" name="id_kelas" id="id_kelas_create">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal update --}}
    <!-- Modal Update Nilai -->
    <div class="modal fade" id="modal-update-nilai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Nilai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateNilaiForm" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nilai">Nilai</label>
                                <input type="number" name="nilai" class="form-control" required>
                            </div>
                            <input type="hidden" name="id_siswa" id="id_siswa_update">
                            <input type="hidden" name="id_materi" id="id_materi_update">
                            <input type="hidden" name="jenis" id="jenis_update">
                            <input type="hidden" name="id_ujian" id="id_ujian_update">
                            <input type="hidden" name="id_tugas" id="id_tugas_update">
                            <input type="hidden" name="id_kelas" id="id_kelas_update">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal delete --}}
    <!-- Modal Delete Nilai -->
    <div class="modal fade" id="modal-delete-nilai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Nilai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteNilaiForm" method="POST">
                        @csrf
                        <div class=" modal-body">
                            <p>Apakah Anda yakin ingin menghapus nilai ini?</p>
                            <input type="hidden" name="id_tugas" id="id_tugas_delete">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
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
      
// show & hidden tabel
       $('.btn-list-tugas').click(function() {
        $('.tbl-tugas').show(); 
        $('.tbl-jawabanTugas').hide();
        });
       $('.btn-jawabanTugas').click(function() {
        $('.tbl-jawabanTugas').show(); 
        $('.tbl-tugas').hide();
        });
    });
</script>

@endsection