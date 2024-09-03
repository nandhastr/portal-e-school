<section class="content">
    <div class="container-fluid">
        <div class="row card-body">
            <div class="col-md-12">
                <div class="card-outline">
                    <div class="card card-header">
                        <div class="card-title mt-2">
                            <button type="button" class="btn btn-primary " data-toggle="modal"
                                data-target="#modal-create">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-3" style="max-height: calc(100vh - 200px); overflow-y: auto;">
                        <table id="example" class="display text-xs table table-bordered table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kategori</th>
                                    <th>gambar</th>
                                    <th>Konten</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($profil))
                                @foreach ($profil as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->kategori }}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/profil-sekolah/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                    <td>{{ $row->konten }}</td>
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
                                <p>tidak ada data</p>
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
                    <h4 class="modal-title">Tambah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-profil-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label> <br>
                            <span><i class="text-sm">File maks: 500kb !</i></span>
                            <input type="file" name="gambar" id="gambar"
                                class="form-control @error('gambar') is-invalid @enderror" placeholder="Pilih Gambar maks:500kb"
                                required>
                            <small id="gambar_error" class="text-red"></small>
                            @error('gambar')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="kategori">Tambah Data Untuk</label>
                            <select name="kategori" id="kategori"
                                class="form-control @error('kategori') is-invalid @enderror"
                                placeholder="Pilih Salah Satu">
                                <option value="">Pilih untuk</option>
                                <option value="tentang_sekolah">Tentang Sekolah</option>
                                <option value="program_sekolah">Program Sekolah</option>
                            </select>
                            <small id="kategori_error" class="text-red is-invalid"></small>
                            @error('kategori')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="konten">Isi Konten</label>
                            <textarea name="konten" id="konten"
                                class="form-control @error('konten') is-invalid @enderror" cols="30" rows="10" required
                                placeholder="Masukkan Isi Konten"></textarea>
                            <small id="konten_error" class="text-red is-invalid"></small>
                            @error('konten')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="button" id="btnSave" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($profil as $row)
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
                    <form action="{{ route('data-profil-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/gift/loading.gif')}}" style="display: none ; width:100px"
                                class="loading">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label> <br>
                            <span><i class="text-sm">File maks: 500kb !</i></span>
                            <input type="file" name="gambar" id="gambar" class="form-control"
                                placeholder="Pilih Gambar maks:500kb">
                            @if ($row->gambar)
                            <img src="{{ asset('assets/img/profil-sekolah/' . $row->gambar) }}"
                                style="width: 200px; height: auto;" class="img-fluid mt-2">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="kategori">Data untuk :</label>
                            <select name="kategori" id="kategori" class="form-control">
                                <option value="{{ $row->kategori }}" selected>{{ $row->kategori }}</option>
                                <option value="tentang_sekolah">Tentang Sekolah</option>
                                <option value="program_sekolah">Program Sekolah</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="konten">Isi Konten</label>
                            <textarea name="konten" id="konten" cols="30" rows="10" class="form-control" required
                                placeholder="Enter Isi Konten">{{ $row->konten }}</textarea>
                        </div>
                        <button type="button" class="btnEdit btn btn-primary">Simpan</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endforeach
    {{-- Modal delete --}}
    @foreach ($profil as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-profil-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{asset('assets/img/gift/loading.gif')}}" style="display: none ; width:100px"
                                class="loading">
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Ini?</p>
                            <h5>Detail data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>gambar</th>
                                    <td><img src="{{ asset('assets/img/profil-sekolah/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid"></td>
                                </tr>
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $row->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>konten</th>
                                    <td>{{ $row->konten }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btnDelete btn btn-danger swalDefaultSuccess">Delete</button>
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