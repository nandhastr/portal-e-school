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
                    <div class="card-body " style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        {{-- tabel mata pelajaran dashboard admin --}}

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Logo</th>
                                    <th>Nama Instansi Pendidikan</th>
                                    <th>terakreditas</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Titik Google Maps</th>
                                    <th>Facebook</th>
                                    <th>Instagram</th>
                                    <th>Youtube</th>
                                    <th>Twitter</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($komponen))
                                @foreach ($komponen as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                    <td>{{ $row->instansi }}</td>
                                    <td>{{ $row->akreditas }}</td>
                                    <td>{{ $row->alamat }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->telepon }}</td>
                                    <td><a target="_blank" href="{{ $row->link_map }}">link Google Maps</a></td>
                                    <td><a target="_blank" href="{{ $row->link_fb }}">Link Facebook</a></td>
                                    <td><a target="_blank" href="{{ $row->link_ig }}">Link Instagram</a></td>
                                    <td><a target="_blank" href="{{ $row->link_yt }}">Link Youtube</a></td>
                                    <td><a target="_blank" href="{{ $row->link_tw }}">{{ $row->link_tw }}Link Twitter
                                    <td>
                                        <small>
                                            <a class="btn bg-success btn-edit" href="#" data-toggle="modal"
                                                data-target="#modal-update_{{ $row->id }}"><i
                                                    class="fa-regular fa-pen-to-square"></i></a>
                                            <a class="btn bg-danger btn-delete" href="#" data-toggle="modal"
                                                data-target="#modal-delete_{{ $row->id }}"><i
                                                    class="fa-regular fa-trash-can"></i></a>
                                        </small>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <p>tidak ada data komponen</p>
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
                    <h4 class="modal-title">Tambah Data komponen</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-komponenSekolah-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" name="instansi" id="instansi"
                                        class="form-control @error('instansi') is-invalid @enderror"
                                        placeholder="Enter instansi" required value="{{old('instansi')}}">
                                    <small id="instansi_error" class="text-red is-invalid"></small>
                                    @error('instansi')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="akreditas">Akreditas</label>
                                    <select name="akreditas"
                                        class="form-control @error('akreditas') is-invalid @enderror"
                                        placeholder="Pilih Akreditas Sekolah">
                                        <option value="">Terakreditas</option>
                                        @foreach (['A','B','C','D','E'] as $ak)
                                        <option value="{{$ak}}">{{$ak}}</option>
                                        @endforeach
                                    </select>
                                    <small id="akreditas_error" class="text-red is-invalid"></small>
                                    @error('akreditas')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter email" required value="{{old('email')}}">
                                    <small id="email_error" class="text-red is-invalid"></small>
                                    @error('email')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="telepon">Telepon</label>
                                    <input type="text" name="telepon" id="telepon"
                                        class="form-control @error('telepon') is-invalid @enderror"
                                        placeholder="Enter telepon" required value="{{old('telepon')}}">
                                    <small id="telepon_error" class="text-red is-invalid"></small>
                                    @error('telepon')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="5"
                                        required value="{{old('alamat')}}" placeholder="Enter Alamat"></textarea>
                                    <small id="alamat_error" class="text-red is-invalid"></small>
                                    @error('alamat')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link_map">link Google Map</label>
                                    <input type="text" name="link_map" id="link_map"
                                        class="form-control @error('link_map') is-invalid @enderror"
                                        placeholder="Enter link google map" value="{{old('link_map')}}">
                                    <small id="link_map_error" class="text-red is-invalid"></small>
                                    @error('link_map')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link_fb">Facebook link</label>
                                    <input type="text" name="link_fb" id="link_fb"
                                        class="form-control @error('link_fb') is-invalid @enderror"
                                        placeholder="Enter link facebook" value="{{old('link_fb')}}">
                                    <small id="link_fb_error" class="text-red is-invalid"></small>
                                    @error('link_fb')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link_ig">Instagram link</label>
                                    <input type="text" name="link_ig" id="link_ig"
                                        class="form-control @error('link_ig') is-invalid @enderror"
                                        placeholder="Enter link instagram" value="{{old('link_ig')}}">
                                    <small id="link_ig_error" class="text-red is-invalid"></small>
                                    @error('link_ig')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link_yt">Youtube link</label>
                                    <input type="text" name="link_yt" id="link_yt"
                                        class="form-control @error('link_yt') is-invalid @enderror"
                                        placeholder="Enter link Youtube" value="{{old('link_yt')}}">
                                    <small id="link_yt_error" class="text-red is-invalid"></small>
                                    @error('link_yt')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="link_tw">Twitter link</label>
                                    <input type="text" name="link_tw" id="link_tw"
                                        class="form-control @error('link_tw') is-invalid @enderror"
                                        placeholder="Enter link Twitter" value="{{old('link_tw')}}">
                                    <small id="link_tw_error" class="text-red is-invalid"></small>
                                    @error('link_tw')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gambar_logo">Gambar logo</label>
                                    <input type="file" name="gambar_logo" id="gambar_logo"
                                        class="form-control @error('gambar_logo') is-invalid @enderror" placeholder="Pilih Gambar logo" required
                                        value="{{old('file')}}">
                                    <small id="gambar_logo_error" class="text-red is-invalid"></small>
                                    @error('gambar_logo')
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
    @foreach ($komponen as $row)
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
                    <form action="{{ route('data-komponenSekolah-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <!-- Kolom pertama -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" name="instansi" id="instansi" class="form-control"
                                        placeholder="Enter instansi" required value="{{ $row->instansi }}">
                                </div>
                                <div class="form-group">
                                    <label for="akreditas">Akreditas</label>
                                    <select name="akreditas" class="form-control">
                                        <option value="">Pilih Akreditasi</option>
                                        @foreach (['A', 'B', 'C', 'D', 'E'] as $akre)
                                        <option value="{{ $akre }}" {{ $row->akreditas == $akre ? 'selected' : '' }}>{{
                                            $akre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5" required
                                        placeholder="Enter Alamat">{{ $row->alamat }}</textarea>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter email" required value="{{ $row->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon">Telepon</label>
                                            <input type="text" name="telepon" id="telepon" class="form-control"
                                                placeholder="Enter telepon" required value="{{ $row->telepon }}">
                                        </div>
                                </div>
                            </div>

                            <!-- Kolom kedua -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="link_map">link Google Maps</label>
                                    <input type="text" name="link_map" id="link_map" class="form-control"
                                        placeholder="Enter link google map" value="{{ $row->link_map }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_fb">Facebook link</label>
                                    <input type="text" name="link_fb" id="link_fb" class="form-control"
                                        placeholder="Enter link facebook" value="{{ $row->link_fb }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_ig">Instagram link</label>
                                    <input type="text" name="link_ig" id="link_ig" class="form-control"
                                        placeholder="Enter link instagram" value="{{ $row->link_ig }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_yt">Youtube link</label>
                                    <input type="text" name="link_yt" id="link_yt" class="form-control"
                                        placeholder="Enter link Youtube" value="{{ $row->link_yt }}">
                                </div>
                                <div class="form-group">
                                    <label for="link_tw">Twitter link</label>
                                    <input type="text" name="link_tw" id="link_tw" class="form-control"
                                        placeholder="Enter link Twitter" value="{{ $row->link_tw }}">
                                </div>
                                <div class="form-group">
                                    <label for="gambar_logo">Gambar logo</label>
                                    <input type="file" name="gambar_logo" id="gambar_logo" class="form-control" placeholder="Pilih Gambar logo">
                                    <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}" style="width: 100px; height: auto;"
                                        class="img-fluid">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($komponen as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus komponenn</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-komponenSekolah-delete', ['id' => $row->id]) }}" method="POST"
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
                                    <th>Logo</th>
                                    <td>
                                        <img src="{{ asset('assets/img/komponen/' . $row->gambar_logo) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nama Instansi</th>
                                    <td>{{ $row->instansi }}</td>
                                </tr>
                                <tr>
                                    <th>Terakreditas</th>
                                    <td>{{ $row->akreditas }}</td>
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
        // datatabel
        new DataTable('#example');
        $('#example').find('.dt-type-numeric').removeClass('dt-type-numeric');


     $('#btnSave').click(function (e) {
    e.preventDefault();
    swal.close();
    
    // Hapus pesan error sebelumnya
    $('.text-red').text('');
    
    // Cek apakah ada inputan form yang kosong
    let emptyFields = $('#dataForm').find('input[type="text"], input[type="email"], input[type="password"],input[type="file"], select, textarea').filter(function () { 
        return $.trim($(this).val()) == '';
    });
    
    // Jika ada kolom input yang kosong
    if (emptyFields.length > 0) {
    emptyFields.each(function() {
    let placeholder = $(this).attr('placeholder');
    let fieldName = $(this).attr('name');
    let message = placeholder + ' !' ; 
    $('#' + fieldName + '_error').text(message); 
    });
    } else {
    // Kirim form dengan AJAX
    let form = $(this).closest('form');
    let formData = new FormData(form[0]);
    
    $.ajax({
    url: form.attr('action'),
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
    title: "Data berhasil di tambahkan",
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
    
    let form = $(this).closest('form');
    let formData = new FormData(form[0]);
    
    $.ajax({
    url: form.attr('action'),
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
    form[0].reset();
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
            title: "Data Berhasil di Hapus !.",
            showConfirmButton: true,
            }).then((result)=>{
                if (result.isConfirmed){
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