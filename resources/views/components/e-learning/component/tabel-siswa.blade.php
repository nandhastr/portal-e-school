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
                                        <th>Foto</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Angkatan</th>
                                        <th>status</th>
                                        <th>Jenis kelamin</th>
                                        <th>Tempat lahir</th>
                                        <th>Tanggal lahir</th>
                                        <th>Nama Ibu</th>
                                        <th>Tahun Masuk</th>
                                        <th>Asal Sekolah</th>
                                        <th>Alamat</th>
                                        <th>No Telpon</th>
                                        <th>email</th>
                                        <th>aktif sebagai</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($siswa))
                                    @foreach ($siswa as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->foto }}</td>
                                        <td>{{ $row->nisn }}</td>
                                        <td>{{ $row->user->name }}</td>
                                        <td>{{ $row->angkatan }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>{{ $row->gender}}</td>
                                        <td>{{ $row->tempat_lahir}}</td>
                                        <td>{{ $row->tanggal_lahir}}</td>
                                        <td>{{ $row->nama_ibu}}</td>
                                        <td>{{ $row->tahun_masuk}}</td>
                                        <td>{{ $row->sekolah_sebelumnya}}</td>
                                        <td>{{ $row->alamat }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->user->email }}</td>
                                        <td>{{ $row->user->role }}</td>

                                        <td>
                                            <button class="btn bg-success btn-edit" data-toggle="modal"
                                                data-target="#modal-edit-siswa-{{ $row->id }}">
                                                <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
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
                    <form action="{{ route('siswa-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="id_kelas" id="kelas" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelas as $kelas_item)
                                    <option value="{{ $kelas_item->id }}">{{ $kelas_item->tingkat }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="text" name="angkatan" id="angkatan" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tahun_masuk">Tahun Masuk</label>
                                <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control" min="1900"
                                    max="{{ date('Y') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sekolah_sebelumnya">Asal Sekolah</label>
                                <input type="text" name="sekolah_sebelumnya" id="sekolah_sebelumnya"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">No Telepon</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Sebagai</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">Pilih Role user</option>
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                    <option value="siswa">Siswa</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal update --}}
    @foreach ($siswa as $row)
    <div class="modal fade" id="modal-edit-siswa-{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Mata Pelajaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="foto">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" class="form-control" value="{{ $row->nisn }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control"
                                    value="{{ $row->user->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control" required>
                                    <option value="">Pilih Kelas</option>
                                    <option value="{{$row->tingkat }}>{{$row->tingkat }}</option>
                                 @foreach ((['X','XI','XII']) as $kelas)
                                     <option value=" {{ $kelas }}">{{ $kelas }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class=" form-group">
                                <label for="angkatan">Angkatan</label>
                                <input type="number" name="angkatan" id="angkatan" class="form-control"
                                    value="{{ $row->angkatan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="">Pilih Status</option>
                                    <option value="Aktif" {{ $row->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Tidak Aktif" {{ $row->status == 'Tidak Aktif' ? 'selected' : ''
                                        }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki" {{ $row->gender == 'Laki-laki' ? 'selected' : ''
                                        }}>Laki-laki</option>
                                    <option value="Perempuan" {{ $row->gender == 'Perempuan' ? 'selected' : ''
                                        }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    value="{{ $row->tempat_lahir }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    value="{{ $row->tanggal_lahir }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control"
                                    value="{{ $row->nama_ibu }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tahun_masuk">Tahun Masuk</label>
                                <input type="number" name="tahun_masuk" id="tahun_masuk" class="form-control"
                                    value="{{ $row->tahun_masuk }}" min="1900" max="{{ date('Y') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="sekolah_sebelumnya">Asal Sekolah</label>
                                <input type="text" name="sekolah_sebelumnya" id="sekolah_sebelumnya"
                                    class="form-control" value="{{ $row->sekolah_sebelumnya }}" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="3"
                                    required>{{ $row->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="phone">No Telpon</label>
                                <input type="text" name="phone" id="phone" class="form-control"
                                    value="{{ $row->phone }}" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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