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

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kelas</th>
                                    <th>Tingkat</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($kelas))
                                @foreach ($kelas as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row['nama'] }}</td>
                                    <td>{{ $row['tingkat'] }}</td>
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