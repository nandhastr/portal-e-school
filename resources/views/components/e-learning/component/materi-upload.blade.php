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
                        {{-- tabel mata pelajaran dashboard admin --}}

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Mata Pelajaran Yang Telah di Upload</th>
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
                                    <td>{{ $row->mata_pelajaran }}</td>
                                    <td>
                                        @if ($row->kelas)
                                        {{ $row->kelas->tingkat }} {{ $row->kelas->nama }}
                                        @else
                                        Belum ditentukan
                                        @endif
                                    </td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>{{ $row->file_path }}</td>
                                    <td>
                                        {{-- <a class="btn bg-success btn-edit" href="#" data-id="{{ $row->id }}"
                                            data-subject="{{ $row->mata_pelajaran }}" data-toggle="modal"
                                            data-target="#modal-update"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn bg-warning btn-delete" href="#" data-id="{{ $row->id }}"
                                            data-toggle="modal" data-target="#modal-delete"><i
                                                class="fa-regular fa-trash-can"></i></a> --}}
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
                    <form action="" id="createMateriForm">
                        @csrf
                        <div class="modal-body">
                            <label for="subject">Mata Pelajaran</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                <option value="">mtk</option>
                                <option value="">indo</option>
                                <option value="">ipa</option>
                            </select>
                            <label for="judul">Judul Materi</label>
                            <textarea name="" id="" cols="30" rows="2" class="form-control"
                                placeholder="Enter Judul Materi"></textarea>
                            {{-- <input type="text" name="judul" id="judul" placeholder="Enter Judul Materi"
                                class="form-control" required> --}}
                            <label for="deskripsi">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" cols="10" rows="4"
                                placeholder="Enter Deskripsi Singkat Materi" class="form-control"></textarea>
                            <label for="tingkat_kelas">Untuk Tingkat Kelas</label>
                            <select name="tingkat_kelas" id="tingkat_kelas" class="form-control">
                                <option value="X/XI/XII" class="disabled">X/XI/XII</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                            <label for="kelas">Ruang</label>
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="A/B/C" class="disabled">A/B/C</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                            <label for="">Pilih Dokumen Materi</label>
                            <input type="file" name='' id='' placeholder="pilih file" class="form-control">
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

    {{-- Modal update --}}
    <div class="modal fade" id="modal-update">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Materi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="createMateriForm">
                        @csrf
                        <div class="modal-body">
                            <label for="subject">Mata Pelajaran</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Mata Pelajaran</option>
                                <option value="">mtk</option>
                                <option value="">indo</option>
                                <option value="">ipa</option>
                            </select>
                            <label for="judul">Judul Materi</label>
                            <textarea name="" id="" cols="30" rows="2" class="form-control"
                                placeholder="Enter Judul Materi"></textarea>
                            {{-- <input type="text" name="judul" id="judul" placeholder="Enter Judul Materi"
                                class="form-control" required> --}}
                            <label for="deskripsi">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" cols="10" rows="4"
                                placeholder="Enter Deskripsi Singkat Materi" class="form-control"></textarea>
                            <label for="tingkat_kelas">Untuk Tingkat Kelas</label>
                            <select name="tingkat_kelas" id="tingkat_kelas" class="form-control">
                                <option value="X/XI/XII" class="disabled">X/XI/XII</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                            <label for="kelas">Ruang</label>
                            <select name="kelas" id="kelas" class="form-control">
                                <option value="A/B/C" class="disabled">A/B/C</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                            </select>
                            <label for="">Pilih Dokumen Materi</label>
                            <input type="file" name='' id='' placeholder="pilih file" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
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