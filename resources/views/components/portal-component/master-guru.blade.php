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
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Jabatan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($guru))
                                @foreach ($guru as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
    
                                        @if(!empty($row->gambar))
                                            <img src="{{ asset('assets/img/guru/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                        @else
                                            <img src="{{ asset('assets/img/guru/default.png') }}" style="width: 200px; height: auto;" class="img-fluid mt-2">
                                         @endif
                                    </td>
                                    <td>{{ $row->nip }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ $row->jabatan }}</td>
                                    <td>{{ $row->genre }}</td>
                                    <td>{{ $row->tempat_lahir }}</td>
                                    <td>{{ $row->tanggal_lahir }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->telepon }}</td>
                                    <td>
                                        {{-- <a class="btn bg-success btn-edit" href="#" data-toggle="modal" data-target="#modal-update_{{ $row->id }}"><i
                                                class="fa-regular fa-pen-to-square"></i></a> --}}

                                        <a class="btn bg-success btn-edit" href="#" data-toggle="modal" data-target="#modal-update_{{ $row->id }}">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a class="btn bg-danger btn-delete" href="#" data-toggle="modal" data-target="#modal-delete_{{ $row->id }}"><i
                                                class="fa-regular fa-trash-can"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>tidak ada data guru</p>
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
                    <h4 class="modal-title">Tambah Data guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-guru-store') }}" method="POST"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}"
                            style="display: none; width: 100px;" class="loading">
                        </div>     
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" id="nip"
                                        class="form-control @error('nip') is-invalid @enderror" placeholder="Enter nip"
                                        required value="{{old('nip')}}">
                                    <small id="nip_error" class="text-red is-invalid"></small>
                                    @error('nip')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Enter nama" required value="{{old('nama')}}">
                                    <small id="nama_error" class="text-red is-invalid"></small>
                                    @error('nama')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <input type="text" name="status" id="status"
                                        class="form-control @error('status') is-invalid @enderror"
                                        placeholder="Enter status " required value="{{old('status')}}">
                                    <small id="status_error" class="text-red is-invalid"></small>
                                    @error('status')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror"
                                        placeholder="Pilih Jabatan">
                                        <option value="">Pilih Jabatan</option>
                                        <option value="Kepala Sekolah">Kepala Sekolah</option>
                                        <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Kepala Bagian Kurikulum">Kepala Bagian Kurikulum</option>
                                        <option value="Kepala Bagian Kesiswaan">Kepala Bagian Kesiswaan</option>
                                        <option value="Kepala Bagian Sarana dan Prasarana">Kepala Bagian Sarana dan Prasarana</option>
                                        <option value="Guru">Guru</option>
                                        <option value="Guru BK">Guru BK</option>
                                        <option value="Pembina OSIS">Pembina OSIS</option>
                                    </select>
                                
                                    @error('jabatan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small id="jabatan_error" class="text-red is-invalid"></small>
                                    @error('jabatan')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="genre">Jenis Kelamin</label>
                                    <select class="form-control @error('genre') is-invalid @enderror" name="genre"
                                        required placeholder="Pilih Jenis kelamin">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    <small id="genre_error" class="text-red is-invalid"></small>
                                    @error('genre')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat lahir</label>
                                    <input type="text" name="tempat_lahir" id="tempat_lahir"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        placeholder="Enter tempat " required value="{{old('tempat_lahir')}}">
                                    <small id="tempat_lahir_error" class="text-red is-invalid"></small>
                                    @error('tempat_lahir')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal lahir</label>
                                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        placeholder="Enter tanggal " required value="{{old('tanggal_lahir')}}">
                                    <small id="tanggal_lahir_error" class="text-red is-invalid"></small>
                                    @error('tanggal_lahir')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class=" form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter email "
                                        required value="{{old('email')}}">
                                    <small id="email_error" class="text-red is-invalid"></small>
                                    @error('email')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class=" form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" name="telepon" id="telepon"
                                        class="form-control @error('telepon') is-invalid @enderror"
                                        placeholder="Enter telepon " required value="{{old('telepon')}}">
                                    <small id="telepon_error" class="text-red is-invalid"></small>
                                    @error('telepon')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar"
                                        class="form-control @error('gambar') is-invalid @enderror"
                                        placeholder="Pilih Gambar maks:500kb" required value="{{old('file')}}">
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
@foreach ($guru as $row)
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
                <form action="{{ route('data-guru-update', ['id'=> $row->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                            class="loading">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control" placeholder="Enter nip"
                                    required value="{{ $row->nip}}">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter nama"
                                    required value="{{ $row->nama}}">
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" name="status" id="status" class="form-control"
                                    placeholder="Enter status " required value="{{$row->status}}">
                            </div>
                            <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control">
                                <option value="">Pilih Jabatan</option>
                                <option value="Kepala Sekolah" {{ $row->jabatan == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                                <option value="Wakil Kepala Sekolah" {{ $row->jabatan == 'Wakil Kepala Sekolah' ? 'selected' : '' }}>Wakil Kepala
                                    Sekolah</option>
                                <option value="Sekretaris" {{ $row->jabatan == 'Sekretaris' ? 'selected' : '' }}>Sekretaris</option>
                                <option value="Bendahara" {{ $row->jabatan == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                <option value="Keamanan" {{ $row->jabatan == 'Keamanan' ? 'selected' : '' }}>Keamanan</option>
                                <option value="Kepala Bagian Kurikulum" {{ $row->jabatan == 'Kepala Bagian Kurikulum' ? 'selected' : '' }}>Kepala
                                    Bagian Kurikulum</option>
                                <option value="Kepala Bagian Kesiswaan" {{ $row->jabatan == 'Kepala Bagian Kesiswaan' ? 'selected' : '' }}>Kepala
                                    Bagian Kesiswaan</option>
                                <option value="Kepala Bagian Sarana dan Prasarana" {{ $row->jabatan == 'Kepala Bagian Sarana dan Prasarana' ?
                                    'selected' : '' }}>Kepala Bagian Sarana dan Prasarana</option>
                                <option value="Guru" {{ $row->jabatan == 'Guru' ? 'selected' : '' }}>Guru</option>
                                <option value="Guru BK" {{ $row->jabatan == 'Guru BK' ? 'selected' : '' }}>Guru BK</option>
                                <option value="Pembina OSIS" {{ $row->jabatan == 'Pembina OSIS' ? 'selected' : '' }}>Pembina OSIS</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="genre">Jenis Kelamin</label>
                                <select class="form-control" name="genre">
                                    @foreach (['laki-laki','perempuan'] as $jns )
                                    <option value="{{ $jns }}" {{ $row->genre == $jns ? 'selected' : '' }}>{{ $jns
                                        }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
                                    placeholder="Enter Tempat lahir " required value="{{ $row->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                                    placeholder="Enter tanggal lahir " required value="{{ $row->tanggal_lahir }}">
                            </div>
                            <div class=" form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Enter email " required value="{{$row->email}}">
                            </div>
                            <div class=" form-group">
                                <label for="telepon">Telepon</label>
                                <input type="text" name="telepon" id="telepon" class="form-control"
                                    placeholder="Enter telepon " required value="{{$row->telepon}}">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label> <br>
                                 <span><i class="text-sm">File maks: 500kb !</i></span>
                                <input type="file" name="gambar" id="gambar" class="form-control"
                                    placeholder="Pilih Gambar maks: 500kb">
                                     <img src="{{ asset('assets/img/guru/' . $row->gambar) }}"
                                            style="width: 100px; height: auto;" class="img-fluid mt-2">
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
    @foreach ($guru as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus guru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-guru-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus guru Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Gambar</th>
                                    <td><img src="{{ asset('assets/img/guru/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid"></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $row->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $row->status }}</td>
                                </tr>
                                <tr>
                                    <th>jabatan</th>
                                    <td>{{ $row->jabatan }}</td>
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
    let emptyFields = $('#dataForm').find('input[type="text"],input[type="file"],input[type="date"],input[type="email"], input[type="select"],select, textarea').filter(function () {
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