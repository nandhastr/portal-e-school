<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card-outline">
                    <div class="card card-header">
                        <div class="card-title mt-2">
                            <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#modal-create">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-3" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <table id="example" class="display text-xs table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>foto</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Jenias Kelamin</th>
                                    <th>Tempat lahir</th>
                                    <th>tanggal lahir</th>
                                    <th>Alamat</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($siswa))
                                @foreach ($siswa as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if(!empty($row->gambar))
                                        <img src="{{ asset('assets/img/siswa/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                            @else
                                            <img src="{{ asset('assets/img/siswa/default.png') }}" style="width: 200px; height: auto;" class="img-fluid mt-2">
                                            @endif
                                    </td>
                                    <td>{{ $row->nis }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->kelas }}</td>
                                    <td>{{ $row->genre }}</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>
                                        <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                            data-target="#modal-update_{{ $row->id }}"><i
                                                class="fa-regular fa-pen-to-square"></i></a>
                                        <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                            data-target="#modal-delete_{{ $row->id }}"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>tidak ada data siswa</p>
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
                    <h4 class="modal-title">Tambah Data Siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-siswa-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nis">nis</label>
                                    <input type="text" name="nis" id="nis"
                                        class="form-control @error('nis') is-invalid @enderror" placeholder="Enter nis" required
                                        value="{{old('nis')}}">
                                    <small id="nis_error" class="text-red is-invalid"></small>
                                    @error('nis')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror" placeholder="Pilih nama"
                                        required value="{{old('nama')}}">
                                    <small id="nama_error" class="text-red is-invalid"></small>
                                    @error('nama')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="form-control  @error('tempat_lahir') is-invalid @enderror"
                                        placeholder="Pilih tempat " required value="{{old('tempat_lahir')}}">
                                    <small id="tempat_lahir_error" class="text-red is-invalid"></small>
                                    @error('tempat_lahir')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        placeholder="Pilih tanggal " required value="{{old('tanggal_lahir')}}">
                                    <small id="tanggal_lahir_error" class="text-red is-invalid"></small>
                                    @error('tanggal_lahir')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="genre">Jenis Kelamin</label>
                                    <select class="form-control @error('genre') is-invalid @enderror" name="genre"
                                        placeholder="Pilih jenis kelamin">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <small id="genre_error" class="text-red is-invalid"></small>
                                    @error('genre')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select class="form-control @error('kelas') is-invalid @enderror" name="kelas"
                                        placeholder="Pili Kelas">
                                        <option value="">Pilih Kelas</option>
                                        @foreach (['X','XI','XII'] as $kls )
                                        <option value="{{ $kls }}">{{$kls}}</option>
                                        @endforeach
                                    </select>
                                    <small id="kelas_error" class="text-red is-invalid"></small>
                                    @error('kelas')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
        
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="10" required
                                        value="{{old('alamat')}}" placeholder="Enter Alamat"></textarea>
                                    <small id="alamat_error" class="text-red is-invalid"></small>
                                    @error('alamat')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar"
                                        class="form-control @error('gambar') is-invalid @enderror" placeholder="Pilih Gambar maks:500kb"
                                        required value="{{old('file')}}">
                                    <small id="gambar_error" class="text-red is-invalid"></small>
                                    @error('gambar')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" id="btnSave" class="btn btn-primary">Tambah Data</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($siswa as $row)
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
                    <form action="{{ route('data-siswa-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center ">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nis">nis</label>
                                    <input type="text" name="nis" id="nis" class="form-control" placeholder="Pilih nis" required
                                        value="{{$row->nis}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Pilih nama"
                                        required value="{{$row->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                        placeholder="Pilih Tempat lahir " required value="{{ $row->tempat_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                        placeholder="Pilih tanggal lahir " required value="{{ $row->tanggal_lahir }}">
                                </div>
                                <div class="form-group">
                                    <label for="genre">Jenis Kelamin</label>
                                    <select class="form-control" name="genre">
                                        @foreach (['laki-laki','perempuan'] as $jns )
                                        <option value="{{ $jns }}" {{ $row->genre == $jns ? 'selected' : '' }}>{{ $jns }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select class="form-control" name="kelas">
                                        <option>{{$row->kelas}}</option>
                                        @foreach (['X','XI','XII'] as $kls )
                                        <option value="{{ $kls }}" {{$row->kelas == $kls ? 'selected': ''}}>{{$kls}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required
                                        value="{{old('alamat')}}" placeholder="Pilih Alamat">{{ $row->alamat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar maks:500kb"
                                        value="{{old('file')}}">
                                        <img src="{{ asset('assets/img/siswa/' . $row->gambar) }}"
                                            style="width: 100px; height: auto;" class="img-fluid">
                                </div>
                            </div>
                            <button type="button" class="btnEdit btn btn-primary">Ubah Data</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($siswa as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus siswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-siswa-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center ">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus siswa Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Foto Siswa</th>
                                    <td>
                                        <img src="{{ asset('assets/img/siswa/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>NIS</th>
                                    <td>{{ $row->nis }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $row->nama }}</td>
                                </tr>
                                <tr>
                                    <th>kelas</th>
                                    <td>{{ $row->kelas }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal lahir</th>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $row->alamat }}</td>
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
    // datatable
    new DataTable('#example');
    $('#example').find('.dt-type-numeric').removeClass('dt-type-numeric');
    
    // alert tambah data
    $('#btnSave').click(function (e) {
    e.preventDefault();
    swal.close();
    
    // Hapus pesan error sebelumnya
    $('.text-red').text('');
    
    // Cek apakah ada inputan form yang kosong
    let emptyFields = $('#dataForm').find('input[type="text"],input[type="file"],input[type="date"],input[type="email"],select,select, textarea').filter(function () {
    return $.trim($(this).val()) == '';
    });
    
    // Jika ada kolom input yang kosong
    if (emptyFields.length > 0) {
    emptyFields.each(function() {
    let placeholder = $(this).attr('placeholder');
    let fieldName = $(this).attr('name');
    let message = placeholder + ' !';
    $('#' + fieldName + '_error').text(message);
    });
    } else {
    // Kirim form dengan AJAX
    let form = $('#dataForm')[0]; // Pastikan menggunakan selector yang benar
    let formData = new FormData(form);
    
    $.ajax({
    url: $(form).attr('action'),
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    beforeSend: function() {
    $('.loading').show();
    },
    success: function(response) {
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Data berhasil ditambahkan",
    showConfirmButton: true,
    }).then((result) => {
    if (result.isConfirmed) {
    $('#modal-create').modal('hide');
    location.reload();
    }
    });
    $('#dataForm')[0].reset();
    $('.loading').hide();
    },
    error: function(xhr) {
    $('.loading').hide();
    if (xhr.status === 422) { // Error validasi
    let errors = xhr.responseJSON.errors;
    $.each(errors, function(key, value) {
    $('#' + key + '_error').text(value[0]);
    });
    } else {
    Swal.fire({
    position: "top-end",
    icon: "error",
    title: "Terjadi kesalahan. Silakan coba lagi.",
    showConfirmButton: true,
    });
    }
    }
    });
    }
    });
    
    // btn edit
    $('.btnEdit').click(function (e) {
    e.preventDefault();
    swal.close();
    
    let form = $(this).closest('form')[0];
    let formData = new FormData(form);
    
    $.ajax({
    url: $(form).attr('action'),
    method: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    beforeSend: function() {
    $('.loading').show();
    },
    success: function(response) {
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Data berhasil diperbarui",
    showConfirmButton: true,
    }).then((result) => {
    if (result.isConfirmed) {
    $('#modal-create').modal('hide');
    location.reload();
    }
    });
    form.reset();
    $('.loading').hide();
    },
    error: function(xhr) {
    $('.loading').hide();
    Swal.fire({
    position: "top-end",
    icon: "error",
    title: "Terjadi kesalahan. Silakan coba lagi.",
    showConfirmButton: true,
    });
    }
    });
    });
    
    // btn delete
    $('.btnDelete').click(function (e) {
    e.preventDefault();
    swal.close();
    
    let form = $(this).closest('form');
    
    $.ajax({
    url: form.attr('action'),
    method: 'POST',
    data: form.serialize(),
    beforeSend: function() {
    $('.loading').show();
    },
    success: function(response) {
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "Data berhasil dihapus!",
    showConfirmButton: true,
    }).then((result) => {
    if (result.isConfirmed) {
    form.closest('.modal').modal('hide');
    $('.loading').hide();
    location.reload();
    }
    });
    },
    error: function(xhr) {
    $('.loading').hide();
    Swal.fire({
    position: "top-end",
    icon: "error",
    title: "Terjadi kesalahan. Silakan coba lagi.",
    showConfirmButton: true,
    });
    }
    });
    });
    });

</script>

@endsection