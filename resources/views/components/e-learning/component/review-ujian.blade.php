<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline">
                    <div class="card-header">
                        <h3 class="card-title mt-2">
                            {{-- <a href="{{ route('exportPdf', ['search' => $request->get('search')]) }}"
                                class="btn btn-primary">
                                Export Data
                            </a> --}}
                        </h3>

                        <div class="card-tools">
                            {{-- <div class="input-group mt-2">
                                <form action="{{ route('reviewExams')}}" method="GET">
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
                            <div class="btn-group">
                                <div class="btn-group" role="group">
                                    <label class="btn btn-info">
                                        <input type="radio" class="form-check-input filter-radio" name="filterOption"
                                            value="all" checked>
                                        Semua
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" class="form-check-input filter-radio" name="filterOption"
                                            value="UTS">
                                        UTS
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" class="form-check-input filter-radio" name="filterOption"
                                            value="UAS">
                                        UAS
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" class="form-check-input filter-radio" name="filterOption"
                                            value="UN">
                                        UN
                                    </label>
                                </div>
                            </div>
                            <table id="example" class="display table-hover text-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Pertanyaan</th>
                                        <th>Jawaban Benar</th>
                                        <th>Jawaban Siswa</th>
                                        <th>Nilai</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($qna))
                                    @foreach ($qna as $row )
                                    {{-- {{ dd($row) }} --}}
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $row->pertanyaan->type}}</td>
                                        <td>{{ $row->siswa->user->name}}</td>
                                        <td>{{ $row->kelas->tingkat}} - {{ $row->ruangKelas->nama }}</td>
                                        <td>{{ $row->materi->mapel->mata_pelajaran }}</td>
                                        <td>{{ $row->pertanyaan->pertanyaan }}</td>
                                        <td>{{ $row->opsi->opsi}}</td>
                                        <td>{{ $row->jawaban }}</td>
                                        <td>{{ $row->nilai }}</td>
                                        <td
                                            class="{{ $row->status == 'lulus' ? 'text-success fw-bold' : 'text-danger fw-bold' }}">
                                            {{ $row->status }}
                                        </td>
                                        <td>
                                            <button class="btn bg-success btn-edit" data-toggle="modal"
                                                data-target="#reviewExamModal_{{ $row->id }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></button>
                                            <button class="btn bg-danger btn-delete" data-toggle="modal"
                                                data-target="#modal-delete"><i
                                                    class="fa-regular fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    Tidak ada data
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal --}}
    @foreach ($qna as $row )
    <div class="modal fade" id="reviewExamModal_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review Exam </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label class="text-sm" for="jenis">Jenis:</label>
                        <input disabled type="text" class="form-control" id="jenis" name="jenis"
                            value="{{ $row->pertanyaan->type }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="nama">Nama:</label>
                        <input disabled type="text" class="form-control" id="nama" name="nama"
                            value="{{ $row->siswa->user->name }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="kelas">Kelas:</label>
                        <input disabled type="text" class="form-control" id="kelas" name="kelas"
                            value="{{ $row->kelas->tingkat }} - {{ $row->kelas->nama }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="mata_pelajaran">Mata Pelajaran:</label>
                        <input disabled type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran"
                            value="{{ $row->materi->mapel->mata_pelajaran }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="pertanyaan">Pertanyaan:</label>
                        <input disabled type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                            value="{{ $row->pertanyaan->pertanyaan }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="jawaban_benar">Jawaban Benar:</label>
                        <input disabled type="text" class="form-control" id="jawaban_benar" name="jawaban_benar"
                            value="{{ $row->opsi->opsi }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="jawaban_siswa">Jawaban Siswa:</label>
                        <input disabled type="text" class="form-control" id="jawaban_siswa" name="jawaban_siswa"
                            value="{{ $row->jawaban }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="nilai">Nilai:</label>
                        <input type="number" class="form-control" id="nilai" name="nilai" value="{{ $row->nilai }}">
                    </div>
                    <div class="modal-body">
                        <label class="text-sm" for="status">Status:</label>
                        <select name="" id="" class="form-control">
                            <option value="">Lulus/Tidak Lulus</option>
                            <option value="">Lulus</option>
                            <option value="">Tidak Lulus</option>
                        </select>
                    </div>
                    <div class="modal-body">
                        <button type="submit" class="btn btn-primary ">Simpan</button>
                    </div>
                </form>
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

        
            // filter tipe ujian
            // Tangani perubahan pada radio button filter
            $('.filter-radio').change(function() {
            // Dapatkan nilai filter yang dipilih
            var filterValue = $(this).val();
            // Terapkan filter
            filterTableRows(filterValue);
            });
            
            // Fungsi untuk menampilkan/menyembunyikan baris tabel berdasarkan filter
            function filterTableRows(filterValue) {
            // Loop melalui setiap baris tabel
            $('tbody tr').each(function() {
            // Dapatkan jenis ujian dari kolom tabel
            var examType = $(this).find('td:nth-child(2)').text();
            
            // Periksa apakah jenis ujian sesuai dengan filterValue
            if (filterValue === 'all' || examType === filterValue) {
            // Jika sesuai, tampilkan baris tabel
                $(this).show();
                } else {
            // Jika tidak sesuai, sembunyikan baris tabel
                    $(this).hide();
                    }
                });
            }
            $('#filter-all').change(function() {
            // Jika radio button "Semua" dipilih
                if ($(this).is(':checked')) {
                    // Tampilkan semua baris tabel
                    $('tbody tr').show();
                 }
            });
    });
</script>

@endsection