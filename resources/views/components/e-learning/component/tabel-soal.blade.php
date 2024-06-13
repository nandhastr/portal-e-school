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
                            {{-- tabel mata pelajaran dashboard guru --}}
                            <table id="example" class="display table-hover text-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kelas</th>
                                        <th>Jenis Ujian</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban Benar</th>
                                        <th>Durasi</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($soal))
                                    @foreach ($soal as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kelas->tingkat }} {{ $row->ruangKelas->nama }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>{{ $row->mapel->mata_pelajaran }}</td>
                                        <td>{{ $row->pertanyaan }}</td>
                                        <td>
                                            @foreach ($row->opsi as $opsi)
                                            @if ($opsi->benar == 1)
                                            <li>{{ $opsi->opsi }}</li>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $row->durasi }}</td>
                                        <td>{{ $row->waktu_mulai }}</td>
                                        <td>{{ $row->waktu_selesai }}</td>

                                        <td>
                                            <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                                data-target="#modal-update_{{ $row->id }}"><i
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- modal crete soal --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Soal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createSoalForm" method="POST" action="">
                        @csrf
                        <div class="modal-body">
                            <label for="jumlah_soal">Jumlah Soal</label>
                            <input type="number" name="jumlah_soal" id="jumlah_soal" class="form-control" required>

                            <label for="kelas">Kelas</label>
                            <select name="kelas" class="form-control" required>
                                <option value="">X</option>
                                <option value="">XI</option>
                                <option value="">XII</option>
                            </select>

                            <label for="jenis_ujian">Jenis Ujian</label>
                            <select name="jenis_ujian" class="form-control" required>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                                <option value="UN">UN</option>
                            </select>

                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" class="form-control" required>

                            <label for="durasi">Durasi (menit)</label>
                            <input type="number" name="durasi" class="form-control" required>

                            <label for="waktu_mulai">Waktu Mulai</label>
                            <input type="datetime-local" name="waktu_mulai" class="form-control" required>

                            <label for="waktu_selesai">Waktu Selesai</label>
                            <input type="datetime-local" name="waktu_selesai" class="form-control" required>
                        </div>

                        <div id="form-pertanyaan" class="modal-body"></div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary btnSoal">Ok</button>
                            <button type="submit" class="btn btn-success saveButton" style="display: none;">Simpan
                                Soal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update Soal -->
    @foreach ($soal as $row )
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Soal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateSoalForm" method="POST" action="">
                        @csrf
                        <div class="modal-body">
                            <label for="kelas_update">Kelas</label>
                            <select name="kelas" id="kelas_update" class="form-control" required>
                                @foreach ($kelas as $kelasItem)
                                <option value="">{{ $kelasItem->tingkat }}</option>
                                @endforeach
                                {{-- <option value="">X</option>
                                <option value="">XI</option>
                                <option value="">XII</option> --}}

                            </select>
                            <label for="kelas_update">Ruang</label>
                            <select name="kelas" id="kelas_update" class="form-control" required>
                                <option value="">{{ $row->kelas->nama }}</option>
                                <option value="">A</option>
                                <option value="">B</option>
                                <option value="">C</option>

                            </select>
                            <label for="jenis_ujian_update">Jenis Ujian</label>
                            <select name="jenis_ujian" id="jenis_ujian_update" class="form-control" required>
                                <option value="">{{ $row->type }}</option>
                                <option value="UTS">UTS</option>
                                <option value="UAS">UAS</option>
                                <option value="UN">UN</option>
                            </select>
                            <label for="mata_pelajaran_update">Mata Pelajaran</label>
                            <select name="" id="" class="form-control" required>
                                <option value="">{{ $row->mapel->mata_pelajaran }}</option>
                                <option value=""></option>
                                <option value=""></option>
                                <option value=""></option>
                            </select>
                            <label for="pertanyaan_update">Pertanyaan</label>
                            <textarea name="pertanyaan" id="pertanyaan_update" class="form-control" required></textarea>
                            <label for="jawaban_benar_update">Jawaban Benar</label>
                            <input type="text" name="jawaban_benar" id="jawaban_benar_update" class="form-control"
                                required>
                            <label for="durasi_update">Durasi (menit)</label>
                            <input type="number" name="durasi" id="durasi_update" class="form-control" required>
                            <label for="waktu_mulai_update">Waktu Mulai</label>
                            <input type="datetime-local" name="waktu_mulai" id="waktu_mulai_update" class="form-control"
                                required>
                            <label for="waktu_selesai_update">Waktu Selesai</label>
                            <input type="datetime-local" name="waktu_selesai" id="waktu_selesai_update"
                                class="form-control" required>
                            <input type="hidden" name="id" id="update_soal_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ok</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Modal Delete Soal -->
    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Soal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="deleteSoalForm" method="POST" action="">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus soal ini?</p>
                            <input type="hidden" name="id" id="delete_soal_id">
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

        $('.btnSoal').click(function (event) {
        event.preventDefault(); // Menghentikan pengiriman formulir secara default
        
        var jumlahSoal = parseInt($('#jumlah_soal').val());
        var formPertanyaan = $('#form-pertanyaan');
        
        // Hapus elemen-elemen form pertanyaan yang sudah ada
        formPertanyaan.empty();
        
        // Buat elemen-elemen form pertanyaan sesuai dengan jumlah soal
        for (var i = 1; i <= jumlahSoal; i++) { var div=$('<div class="form-group"></div>');
            div.append(`
            <label for="pertanyaan${i}">Pertanyaan ${i}</label>
            <textarea name="pertanyaan${i}" class="form-control" required></textarea>
            <label for="jawaban_benar${i}">Jawaban Benar ${i}</label>
            <input type="text" name="jawaban_benar${i}" class="form-control" required>
            <label for="opsi_a${i}">Opsi A ${i}</label>
            <input type="text" name="opsi_a${i}" class="form-control" required>
            <label for="opsi_b${i}">Opsi B ${i}</label>
            <input type="text" name="opsi_b${i}" class="form-control" required>
            <label for="opsi_c${i}">Opsi C ${i}</label>
            <input type="text" name="opsi_c${i}" class="form-control" required>
            <label for="opsi_d${i}">Opsi D ${i}</label>
            <input type="text" name="opsi_d${i}" class="form-control" required>
            `);
            formPertanyaan.append(div);
            }
            $('.saveButton').show();
            $('.btnSoal').hide();

            });
    });

</script>

@endsection