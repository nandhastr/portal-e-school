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

                    <div class="card-body">
                        {{-- tabel mata pelajaran dashboard admin --}}
                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Tingkat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Foreach untuk menampilkan data kelas --}}
                                @forelse ($kelas as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->tingkat }}</td>
                                    <td>
                                        {{-- Tombol edit dengan modal --}}
                                        <button class="btn bg-success btn-edit" data-toggle="modal"
                                            data-target="#modal-update_{{ $row->id }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </button>
                                        {{-- Tombol delete --}}
                                        <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                            data-target="#modal-delete_{{ $row->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                tidak ada kelas
                                @endforelse
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
                    <h4 class="modal-title">Tambah Data Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas-store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <select name="tingkat" id="tingkat" class="form-control">
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Update --}}
    @foreach ($kelas as $row)
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('kelas-update', ['id' => $row->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tingkat">Tingkat</label>
                            <select name="tingkat" id="tingkat" class="form-control">
                                <option value="X" {{ $row->tingkat == 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $row->tingkat == 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $row->tingkat == 'XII' ? 'selected' : '' }}>XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal Delete --}}
    @foreach ($kelas as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data Kelas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('kelas-delete', ['id' => $row->id]) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Kelas ini?</p>
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
<script src='https://cdn.datatables.net/2.0.8/js/dataTables.js'> </script>
<script>
    $(document).ready(function () {
        // Inisialisasi DataTable
        $('#example').DataTable();
    });
</script>
@endsection