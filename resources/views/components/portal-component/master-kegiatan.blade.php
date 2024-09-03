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
                                    <th>Gambar</th>
                                    <th>Kategori</th>
                                    <th>Judul kegiatan</th>
                                    <th>Tempat Kegiatan</th>
                                    <th>Tanggal Kegiatan</th>
                                    <th>Waktu Kegiatan</th>
                                    <th>Deskripsi</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($kegiatan))
                                @foreach ($kegiatan as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if(!empty($row->gambar))
                                        <img src="{{ asset('assets/img/kegiatan/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                         @else
                                        <img src="{{ asset('assets/img/kegiatan/default.jpeg') }}" style="width: 200px; height: auto;" class="img-fluid mt-2">
                                        @endif
                                    </td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->tempat }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->waktu }}</td>
                                    <td>{{ $row->deskripsi }}</td>
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
                                <p>tidak ada kegiatan</p>
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
                    <h4 class="modal-title">Tambah kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-kegiatan-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="kategori">Kategori Kegiatan Osis</label>
                                    <select name="kategori" class="form-control @error('kategori') is-invalid @enderror"
                                        placeholder="Pilih Kategori" required>
                                        <option value="">Pilih Kategori</option>
                                        <option value="osis">Osis</option>
                                    </select>
                                    <small id="kategori_error" class="text-red is-invalid"></small>
                                    @error('kategori')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul kegiatan</label>
                                    <textarea name="judul" id="judul" cols="30"
                                        class="form-control @error('judul') is-invalid @enderror" required
                                        placeholder="Enter Judul kegiatan">{{ old('judul') }}</textarea>
                                    <small id="judul_error" class="text-red is-invalid"></small>
                                    @error('judul')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat kegiatan</label>
                                    <textarea name="tempat" id="tempat" cols="30"
                                        class="form-control @error('tempat') is-invalid @enderror" required
                                        placeholder="Enter tempat kegiatan">{{ old('tempat') }}</textarea>
                                    <small id="tempat_error" class="text-red is-invalid"></small>
                                    @error('tempat')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu kegiatan</label>
                                    <input name="waktu" id="waktu" type="time"
                                        class="form-control @error('waktu') is-invalid @enderror" required
                                        value="{{ old('waktu') }}" placeholder="Enter waktu kegiatan">
                                    <small id="waktu_error" class="text-red is-invalid"></small>
                                    @error('waktu')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Dilaksanakan Pada Tanggal :</label>
                                    <input type="date" name="tanggal" id="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror"
                                        placeholder="Pilih tanggal" required value="{{ old('tanggal') }}">
                                    <small id="tanggal_error" class="text-red is-invalid"></small>
                                    @error('tanggal')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi kegiatan</label>
                                    <textarea name="deskripsi" id="deskripsi"
                                        class="form-control @error('deskripsi') is-invalid @enderror" cols="30"
                                        rows="10" required
                                        placeholder="Enter deskripsi kegiatan">{{ old('deskripsi') }}</textarea>
                                    <small id="deskripsi_error" class="text-red is-invalid"></small>
                                    @error('deskripsi')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar"
                                        class="form-control @error('gambar') is-invalid @enderror"
                                        placeholder="Pilih Gambar maks:500kb" required value="{{ old('gambar') }}">
                                    <small id="gambar_error" class="text-red is-invalid"></small>
                                    @error('gambar')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" id="btnSave" class="btn btn-primary">Tambah kegiatan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($kegiatan as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-kegiatan-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="kategori">Kategori Kegiatan Osis</label>
                                    <select name="kategori" class="form-control">
                                        <option value="osis" {{ $row->kategori == 'osis' ? 'selected' : '' }}>Osis
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="judul">Judul kegiatan</label>
                                    <textarea name="judul" id="judul" cols="30" class="form-control" required
                                        placeholder="Enter Judul kegiatan">{{ $row->judul }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat kegiatan</label>
                                    <textarea name="tempat" id="tempat" cols="30" class="form-control" required
                                        placeholder="Enter tempat kegiatan">{{ $row->tempat }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu kegiatan</label>
                                    <input name="waktu" id="waktu" type="time" class="form-control" required
                                        placeholder="Enter waktu kegiatan" value="{{ $row->waktu }}">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Dilaksanakan Pada Tanggal :</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                                        placeholder="Pilih tanggal" required value="{{ $row->tanggal }}">
                                </div>
                            </div>

                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi kegiatan</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"
                                        required placeholder="Enter deskripsi kegiatan">{{ $row->deskripsi }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar" class="form-control"
                                        placeholder="Pilih Gambar maks:500kb">
                                    <img src="{{ asset('assets/img/kegiatan/' . $row->gambar) }}"
                                        style="width: 100px; height: auto;" class="img-fluid">
                                </div>
                            </div>
                            <button type="button" class="btnEdit btn btn-primary">Ubah kegiatan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($kegiatan as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-kegiatan-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus kegiatan Ini?</p>
                            <h5>Detail Data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        <img src="{{ asset('assets/img/kegiatan/' . $row->gambar) }}"
                                            style="width: 100px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Judul kegiatan</th>
                                    <td>{{ $row->judul }}</td>
                                </tr>
                                <tr>
                                    <th>isi kegiatan</th>
                                    <td>{{ $row->deskripsi }}</td>
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
    let emptyFields = $('#dataForm').find('input[type="text"],input[type="file"],input[type="time"],input[type="date"],select, textarea').filter(function () {
    return $.trim($(this).val()) == '';
    });
    
    // Jika ada kolom input yang kosong
    if (emptyFields.length > 0) {
    emptyFields.each(function() {
    emptyFields.first().focus();
    let placeholder = $(this).attr('placeholder');
    let fieldName = $(this).attr('name');
    let message = placeholder + ' !';
    $('#' + fieldName + '_error').text(message);
    });
    } else {
    // Kirim form dengan AJAX
    let form = $('#dataForm')[0]; 
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