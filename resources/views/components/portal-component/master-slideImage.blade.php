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
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($slideImage))
                                        @foreach ($slideImage as $row)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img src="{{ asset('assets/img/gambarSlide/' . $row->gambar) }}"
                                                    style="width: 50px; height: auto;" class="img-fluid">
                                            </td>
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
                                    <p>tidak ada data slideImage</p>
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
                        <h4 class="modal-title">Tambah Data slideImage</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="dataForm" action="{{ route('data-slider-store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                    class="loading">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label> <br>
                                <span><i class="text-sm">Ukuran Gambar : 1920x815, maks: 1mb !</i></span>
                                <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar maks:1mb" required>
                                <small id="gambar_error" class="text-red"></small>
                                @error('gambar')
                                    <small class="text-red">{{ $message }}</small>
                                @enderror
                            </div>

                            <button type="button" id="btnSave" class="btn btn-primary">Tambah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($slideImage as $row)
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
                        <form action="{{ route('data-slider-update',['id' => $row->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                    class="loading">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label><br>
                                <span><i class="text-sm">Ukuran Gambar : 1920x815, maks: 1mb !</i></span>
                                <input type="file" name="gambar" id="gambar" class="form-control" placeholder="Pilih Gambar maks:1mb"
                                    value="{{old('file')}}">
                            </div>
                            <button type="button" class="btnEdit btn btn-primary">Ubah Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{-- Modal delete --}}
        @foreach ($slideImage as $row)
        <div class="modal fade" id="modal-delete_{{ $row->id }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus slideImagen</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('data-slider-delete', ['id' => $row->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="{{ asset('assets/img/gift/loading.gif') }}" style="display: none; width: 100px;"
                                    class="loading">
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin ingin menghapus slideImage Ini?</p>
                                <h5>Detail data</h5>
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Gambar</th>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('assets/img/gambarSlide/' . $row->gambar) }}" style="width: 200px; height: auto;" class="img-fluid"></td>
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
        let emptyFields = $('#dataForm').find('input[type="file"]').filter(function () {
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
        let form = $(this).closest('form');
        let formData = new FormData(form[0]);
        
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