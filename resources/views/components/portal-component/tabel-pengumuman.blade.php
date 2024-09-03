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
                                    <th>Gambar</th>
                                    <th>Judul Pengumuman</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Waktu Pelaksanaan</th>
                                    <th>Tempat Pelaksanaan</th>
                                    <th>keterangan Pengumuman</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($pengumuman))
                                @foreach ($pengumuman as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if(!empty($row->gambar))
                                            <img src="{{ asset('assets/img/pengumuman/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                        @else
                                            <img src="{{ asset('assets/img/pengumuman/default.jpeg') }}" style="width: 200px; height: auto;" class="img-fluid mt-2">
                                        @endif
                                    </td>
                                    <td>{{ $row->judul }}</td>
                                    <td>{{ $row->tanggal }}</td>
                                    <td>{{ $row->tempat }}</td>
                                    <td>{{ $row->waktu }}</td>
                                    <td>{{ $row->keterangan }}</td>
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
                                <p>tidak ada pengumuman</p>
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
                    <h4 class="modal-title">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="dataForm" action="{{ route('data-pengumuman-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="judul">Judul Pengumuman</label>
                                    <textarea name="judul" id="judul" cols="30" class="form-control" required
                                        placeholder="Enter Judul Pengumuman"></textarea>
                                    <small id="judul_error" class="text-red"></small>
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <textarea name="tempat" id="tempat" cols="30" class="form-control" required
                                        placeholder="Enter tempat Pengumuman"></textarea>
                                    <small id="tempat_error" class="text-red"></small>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pelaksanaan</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                                        placeholder="Pilih tanggal" required>
                                    <small id="tanggal_error" class="text-red"></small>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="time" name="waktu" id="waktu" class="form-control" placeholder="Pilih waktu"
                                        required>
                                    <small id="waktu_error" class="text-red"></small>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="keterangan">keterangan Pengumuman</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"
                                        required placeholder="Enter keterangan Pengumuman"></textarea>
                                    <small id="keterangan_error" class="text-red"></small>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar maks:500kb" required>
                                    <small id="gambar_error" class="text-red"></small>
                                
                                    @error('gambar')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="button" id="btnSave" class=" btn btn-primary">Tambah Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($pengumuman as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-pengumuman-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="judul">Judul Pengumuman</label>
                                    <textarea name="judul" id="judul" cols="30" class="form-control" required
                                        placeholder="Enter Judul Pengumuman">{{$row->judul}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="tempat">Tempat</label>
                                    <textarea name="tempat" id="tempat" cols="30" class="form-control" required
                                        placeholder="Enter tempat Pengumuman">{{$row->tempat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="waktu">Waktu</label>
                                    <input type="time" name="waktu" id="waktu" class="form-control" placeholder="Pilih waktu"
                                        value="{{ $row->waktu }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal Pelaksanaan</label>
                                    <input type="date" name="tanggal" id="tanggal" class="form-control"
                                        placeholder="Pilih tanggal" required value="{{ $row->tanggal }}">
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="keterangan">keterangan Pengumuman</label>
                                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"
                                        required placeholder="Enter keterangan Pengumuman">{{$row->keterangan}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label> <br>
                                    <span><i class="text-sm">File maks: 500kb !</i></span>
                                    <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar maks:500kb">
                                    @if ($row->gambar)
                                    <img src="{{ asset('assets/img/pengumuman/' . $row->gambar) }}" style="width: 200px; height: auto;"
                                        class="img-fluid mt-2">
                                    @endif
                                    
                                </div>
                            </div>
                            <button type="butoon" class="btnEdit btn btn-primary">Ubah Pengumuman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($pengumuman as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pengumumann</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-pengumuman-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                class="loading">
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Pengumuman Ini?</p>
                            <h5>Detail Data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Gambar</th>
                                    <td>
                                        <img src="{{ asset('assets/img/pengumuman/' . $row->gambar) }}"
                                            style="width: 50px; height: auto;" class="img-fluid">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Judul Pengumuman</th>
                                    <td>{{ $row->judul }}</td>
                                </tr>
                                <tr>
                                    <th>keterangan Pengumuman</th>
                                    <td>{{ $row->keterangan }}</td>
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

<style link="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"></style>
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
    let emptyFields = $('#dataForm').find('input[type="text"],input[type="file"],input[type="date"],input[type="time"], select, textarea').filter(function () { 
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