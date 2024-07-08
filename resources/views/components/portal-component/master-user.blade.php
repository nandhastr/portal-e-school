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
                    <div class="card-body " style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        {{-- tabel dashboard admin --}}

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>User Level</th>
                                    <th>Email</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($level as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>@if ($row->role == 'osis')
                                        Ketua Osis
                                        @else
                                        {{ $row->role }}
                                        @endif</td>
                                    <td>{{ $row->email }}</td>
                                    <td>
                                        <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                            data-target="#modal-update_{{ $row->id }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                            data-target="#modal-delete_{{ $row->id }}">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
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
                    <h4 class="modal-title">Tambah Data users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{ route('data-user-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/gift/loading.gif')}}" style="display: none ; width:100px"
                                class="loading">
                        </div>
                        <div class="form-group">
                            <label for="role">Level</label>
                            <select type="text" class="form-control @error('role') is-invalid @enderror" name="role">
                                <option>Pilih Level Users</option>
                                <option value="admin">Admin</option>
                                <option value="osis">Ketua Osis</option>
                            </select>
                            @error('role')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter nama "
                                required value="{{old('name')}}">
                            @error('name')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class=" form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"
                                class="form-control @error('email') is-invalid @enderror" required
                                value="{{old('email')}}" placeholder="Enter email">
                            @error('email')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror" required
                                value="{{old('password')}}" placeholder="Enter password">
                            @error('password')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="button" id="btnSave" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($level as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-user-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/gift/loading.gif')}}" style="display: none ; width:100px"
                                class="loading">
                        </div>
                        <div class="form-group">
                            <label for="role">Level</label>
                            <select class="form-control" name="role" id="role">
                                <option>Pilih Level Users</option>
                                <option value="admin" {{ $row->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="admin">Admin</option>
                                <option value="osis">Ketua Osis</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter nama"
                                required value="{{ $row->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required
                                value="{{ $row->email }}" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter password">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                password</small>
                        </div>
                        <button type="button" id="" class="btnEdit btn btn-primary">Ubah users</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($level as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus users</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-user-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{asset('assets/img/gift/loading.gif')}}" style="display: none ; width:100px"
                                    class="loading">
                            </div>
                            <p>Apakah Anda yakin ingin menghapus users Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <th>Nama</th>
                                <td>{{ $row->name }}</td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>{{ $row->role }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btnDelete btn btn-danger">Delete</button>
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

        // alert tambah data 
        $('#btnSave').click(function (e) {
        e.preventDefault();
        swal.close();
        
        // Cek apakah ada inputan form yang kosong
        let emptyFields = $(this).closest('form').find('input[type="text"], input[type="email"], input[type="password"], select').filter(function () {
        return $.trim($(this).val()) == '';
        });
        
        // Jika ada kolom input yang kosong
        if (emptyFields.length > 0) {
            $('.loading').show()
            Swal.fire({
                position: "top-end",
                icon: "warning",
                title: "Data Gagal Di Tambahkan, Silahkan Cek Kembali Form",
                showConfirmButton: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).closest('form').submit();
                }
                });
            } else {
                Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Data berhasil di tambah",
                showConfirmButton: true,
                });
                    setTimeout(() => {
                    $(this).closest('form').submit();
                    }, 1500);
                    $('.loading').show()
                }
            });

            // alert edit data
            $('.btnEdit').click(function (e) {
            e.preventDefault();
            swal.close();
           
           let btnEdit = $(this); 
            
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil di ubah",
            showConfirmButton: false,
            timer: 1500
            });
            
            setTimeout(() => {
            btnEdit.closest('form').submit(); 
            }, 1500);
            $('.loading').show()
            });
    
            // alert delete
            $('.btnDelete').click(function (e) {
            e.preventDefault();
            swal.close();
           
           let btnDelete = $(this); 
            
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil di hapus",
            showConfirmButton: false,
            timer: 1500
            });
            
            setTimeout(() => {
            btnDelete.closest('form').submit(); 
            }, 1500);
            $('.loading').show()
            
            
        });

    });
</script>

@endsection