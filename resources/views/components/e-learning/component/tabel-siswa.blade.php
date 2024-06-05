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
                    <div class="card-body">
                        {{-- tabel mata pelajaran dashboard admin --}}

                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th>status</th>
                                    <th>Jenis kelamin</th>
                                    <th>Tempat, Tanggal lahir</th>
                                    <th>Alamat</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($siswa))
                                @foreach ($siswa as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row['nisn'] }}</td>
                                    <td>{{ $row['user']['name'] }}</td>
                                    {{-- <td>{{ $row['Kelas']['nama']}}</td> --}}
                                    <td>{{ $row['angkatan'] }}</td>
                                    <td>{{ $row['status'] }}</td>
                                    <td>{{ $row['gender'] }}</td>
                                    <td>{{ $row['tampal_lahir']}}</td>
                                    <td>{{ $row['alamat'] }}</td>

                                    <td><a class="btn bg-success" href="">Edit</a> | <a class="btn bg-warning"
                                            href="">Delete</a></td>
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

    {{-- Modal Create --}}
    <div class="modal fade" id="modal-create">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" id="createSubject">
                        @csrf
                        <div class="modal-body">
                            <label for="">Mata Pelajaran</label>
                            <input type="text" name="subject" placeholder="Enter Nama Mata Pelajaran"
                                class="form-control" required>
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
                    <form id="updateSubject">
                        @csrf
                        <div class="modal-body">
                            <label for="">Mata Pelajaran</label>
                            <input type="text" name="subject" placeholder="Enter Subject Name" id="update_subject"
                                required class="form-control">
                            <input type="hidden" name="id" id="update_subject_id">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit</button>
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
                            <p>Apakah Anda yakin ingin menghapus Mata Pelajaran?</p>
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
    });
</script>

@endsection