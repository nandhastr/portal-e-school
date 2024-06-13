<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-2">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-create-materi">
                                Upload Materi
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
                        <h6 class="text-center text-warning text-decoration-underline">Data Materi Yang di Upload</h6>

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Judul</th>
                                    <th>Untuk Kelas</th>
                                    <th>Tanggal</th>
                                    <th>File</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($materi))
                                @foreach ($materi as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->mapel->mata_pelajaran }}</td>
                                    <td>{{ $row->judul}}</td>
                                    <td>
                                        @if ($row->kelas)
                                        {{ $row->kelas->tingkat }} {{ $row->ruangKelas->nama }}
                                        @else
                                        Belum ditentukan
                                        @endif
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->file_path }}</td>
                                    <td>
                                        <button class="btn bg-success btn-edit" data-toggle="modal"
                                            data-target="#updateMateriModal{{ $row->id }}"><i
                                                class="fa-regular fa-pen-to-square"></i></button>
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

    {{-- Modal Create Materi --}}
    {{-- Modal Create Materi --}}
    <div class="modal fade" id="modal-create-materi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="createMateriForm">
                        @csrf
                        <div class="modal-body">
                            <label for="subject">Mata Pelajaran</label>
                            <select name="id_mapel" class="form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($materi as $row)
                                <option value="">{{ $row->mapel->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                            <label for="judul">Judul Materi</label>
                            <textarea name="judul" cols="30" rows="2" class="form-control"
                                placeholder="Enter Judul Materi"></textarea>

                            <label for="deskripsi">Deskripsi Singkat</label>
                            <textarea name="deskripsi" cols="10" rows="4" placeholder="Enter Deskripsi Singkat Materi"
                                class="form-control"></textarea>

                            <label for="tingkat_kelas">Untuk Tingkat Kelas</label>
                            <select name="tingkat_kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $row)
                                <option value="">{{ $row->tingkat }}</option>
                                @endforeach
                            </select>


                            <label for="kelas">Ruang</label>
                            <select name="id_kelas" class="form-control">
                                <option value="">Pilih Ruang Kelas</option>
                                @foreach ($ruang as $row)
                                <option value="">{{ $row->nama }}</option>
                                @endforeach
                            </select>
                            <label for="file_path">Pilih Dokumen Materi</label>
                            <input type="file" name="file_path" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($materi as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="updateMateriModal{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="updateMateriForm_{{ $row->id }}">
                        @csrf
                        <div class="modal-body">
                            <label for="subject">Mata Pelajaran</label>
                            <select name="id_mapel" class="form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($materi as $materi_item)
                                <option value="{{ $materi_item->id }}" @if ($materi_item->id == $row->id) selected
                                    @endif>{{
                                    $materi_item->mapel->mata_pelajaran }}</option>
                                @endforeach
                            </select>
                            <label for="judul">Judul Materi</label>
                            <textarea name="judul" cols="30" rows="2" class="form-control"
                                placeholder="Enter Judul Materi">{{ $row->judul }}</textarea>

                            <label for="deskripsi">Deskripsi Singkat</label>
                            <textarea name="deskripsi" cols="10" rows="4" placeholder="Enter Deskripsi Singkat Materi"
                                class="form-control">{{ $row->deskripsi }}</textarea>

                            <label for="tingkat_kelas">Untuk Tingkat Kelas</label>
                            <select name="tingkat_kelas" class="form-control">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelas as $kelas_item)
                                <option value="{{ $kelas_item->id }}" @if ($kelas_item->id == $row->id_kelas) selected
                                    @endif>{{ $kelas_item->tingkat }}</option>
                                @endforeach
                            </select>

                            <label for="kelas">Ruang</label>
                            <select name="id_kelas" class="form-control">
                                <option value="">Pilih Ruang Kelas</option>
                                @foreach ($ruang as $ruang_item)
                                <option value="{{ $ruang_item->id }}" @if ($ruang_item->id == $row->id_kelas) selected
                                    @endif>{{ $ruang_item->nama }}</option>
                                @endforeach
                            </select>
                            <label for="file_path">Pilih Dokumen Materi</label>
                            <input type="file" name="file_path" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- Modal delete --}}
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteSubject">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Materi?</p>
                            <input type="hidden" name="id" id="delete_subject_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Ya, Hapus!</button>
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