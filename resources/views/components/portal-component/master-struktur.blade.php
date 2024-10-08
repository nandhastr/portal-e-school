<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
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
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Telpon</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($struktur))
                                @foreach ($struktur as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/guru/' . $row->guru->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                    <td>{{ $row->guru->nama }}</td>
                                    <td>{{ $row->jabatan }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->telepon }}</td>
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
                                <p>tidak ada data struktur</p>
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
                    <h4 class="modal-title">Tambah Data struktur</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-struktur-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;" class="loading">
                        </div>
                        <div class="form-group">
                            <label for="id_guru">Nama</label>
                            <select name="id_guru" class="form-control @error('id_guru') is-invalid @enderror" required placeholder="Pilih Guru">
                                <option value="">Pilih Nama Guru</option>
                                @foreach ($guru as $item )
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            <small id="id_guru_error" class="text-red is-invalid"></small>
                            @error('id_guru')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                                <select name="jabatan" id="jabatan" class="form-control @error('jabatan') is-invalid @enderror" placeholder="Pilih Jabatan">
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
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter email " required value="{{old('email')}}">
                            <small id="email_error" class="text-red is-invalid"></small>
                            @error('email')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control @error('telepon') is-invalid @enderror"
                                placeholder="Enter telepon " required value="{{old('telepon')}}">
                            <small id="telepon_error" class="text-red is-invalid"></small>
                            @error('telepon')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    
                        <button type="button" id="btnSave" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @foreach ($struktur as $row)
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
                    <form action="{{ route('data-struktur-update', ['id'=> $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="form-group">
                            <label for="id_guru">Nama</label>
                            <select name="id_guru" id="id_guru" class="form-control @error('id_guru') is-invalid @enderror">
                                <option value="">Pilih Nama Guru</option>
                                @foreach ($guru as $gr)
                                <option value="{{ $gr->id }}" {{ old('id_guru', $row->id_guru) == $gr->id ? 'selected' : '' }}>
                                    {{ $gr->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('id_guru')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                        <div class=" form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email "
                                required value="{{$row->email}}">
                        </div>
                        <div class=" form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control"
                                placeholder="Enter telepon " required value="{{$row->telepon}}">
                        </div>

                        <button type="button" class="btnEdit btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($struktur as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus strukturn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-struktur-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus data Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Foto</th>
                                    <td>
                                        <img src="{{ asset('assets/img/guru/' . $row->guru->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $row->guru->nama }}</td>
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

    // ambill data email dan teelepon guru
    $('select[name="id_guru"]').on('change', function() {
    var guruId = $(this).val();
    if (guruId) {
    $.ajax({
    url: '/get-guru/' + guruId,
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    $('input[name="email"]').val(data.email);
    $('input[name="telepon"]').val(data.telepon);
    },
    error: function() {
    Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Terjadi kesalahan saat mengambil data guru!',
    });
    }
    });
    } else {
    $('input[name="email"]').val('');
    $('input[name="telepon"]').val('');
    }
    });
    // end


    // alert tambah data
    $('#btnSave').click(function (e) {
    e.preventDefault();
    swal.close();
    
    // Hapus pesan error sebelumnya
    $('.text-red').text('');
    
    // Cek apakah ada inputan form yang kosong
    let emptyFields = $('#dataForm').find('input[type="text"],input[type="file"],input[type="email"], select, textarea').filter(function () {
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