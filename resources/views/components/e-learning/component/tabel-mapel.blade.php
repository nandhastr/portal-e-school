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
                    {{-- alert --}}
                    @if(session('success'))
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: '{{ session('success') }}',
                            showConfirmButton: false,
                            timer: 1500
                            });
                    </script>
                    @endif
                    <div style="overflow-x:auto; overflow-y:auto;">
                        <div class="card-body">
                            {{-- tabel mata pelajaran dashboard admin --}}

                            <table id="example" class="display table-hover text-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Mata Pelajaran</th>
                                        <th>Deskripsi</th>
                                        <th>Mata Pelajaran Kelas</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($mapel as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->mata_pelajaran }}</td>
                                        <td>{{ $row->deskripsi }}</td>
                                        <td>{{ $row->tingkat_kelas }}</td>
                                        <td>
                                            <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                                data-target="#modal-update_{{ $row->id }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>

                                            <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                                data-target="#modal-delete_{{ $row->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">Tidak ada mata pelajaran</td>
                                    </tr>
                                    @endforelse
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
                    <h4 class="modal-title">Tambah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('mapel-store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" id="nama" class="form-control"
                                placeholder="Masukkan Nama Mata Pelajaran" required value="{{ old('mata_pelajaran') }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"
                                placeholder="Masukkan Deskripsi Mata Pelajaran">{{ old('deskripsi') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="tingkat_kelas">Mata Pelajaran Kelas</label>
                            <select name="tingkat_kelas" id="tingkat_kelas" class="form-control">
                                <option value="">Pilih Tingkat Kelas</option>
                                @foreach ($kelas as $row )
                                <option value="{{ $row->tingkat }}">{{ $row->tingkat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Mata Pelajaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($mapel as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('mapel-update',['id' => $row->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Mata Pelajaran</label>
                            <input type="text" name="mata_pelajaran" id="nama" class="form-control"
                                placeholder="{{ $row->mata_pelajaran }}" required value="{{ $row->mata_pelajaran }}">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control text-start" rows="3"
                                placeholder="Masukkan Deskripsi Mata Pelajaran" value="{{ $row->deskripsi }}">
                                {{ $row->deskripsi }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="tingkat_kelas">Mata Pelajaran Kelas</label>
                            <select name="tingkat_kelas" id="tingkat_kelas" class="form-control">
                                <option value="{{ $row->tingkat_kelas }}">{{ $row->tingkat_kelas }}</option>
                                @foreach ($kelas as $row )
                                <option value="{{ $row->tingkat }}">{{ $row->tingkat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Mata Pelajaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- Modal delete --}}
    @foreach ($mapel as $row)
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
                    <form action="{{ route('mapel-delete', ['id' => $row->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Mata Pelajaran?</p>
                            <input type="hidden" name="id" value="{{ $row->id }}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
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
$('.btn-delete').click(function (e) { 
    e.preventDefault();
    var id = $(this).data('id');
    console.log(id);
    // $('#delete_subject_id').val(id);
    // $('#modal-delete_' + id).modal('show');

    
});
   

</script>

@endsection