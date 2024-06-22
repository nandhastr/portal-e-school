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
                    <div style="overflow-x:auto; overflow-y:auto;">
                        <div class="card-body">
                            {{-- tabel mata pelajaran dashboard admin --}}

                            <table id="example" class="display table-hover text-xs" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Visi</th>
                                        <th>Isi</th>
                                        <th>aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($visi))
                                    @foreach ($visi as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kategori }}</td>
                                        <td style="white-space: pre-wrap;">{{ $row->konten }}</td>
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
                                    <p>tidak ada visi</p>
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
                    <h4 class="modal-title">Tambah Visi Misi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-visimisi-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Visi/Misi</label>
                            <select name="kategori" class="form-control">
                                @foreach (['visi','misi'] as $vm)
                                <option value="{{$vm}}">{{$vm}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="konten">Visi/Misi</label>
                            <textarea name="konten" id="summernote" placeholder="Enter visi/misi" class="form-control"
                                rows="10">

                                          </textarea>
                            <small class="form-text text-muted">Separate each point with a new line and use • for bullet
                                points.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($visi as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah visi/misi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-visimisi-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kategori">Visi/Misi</label>
                            <select name="kategori" class="form-control">
                                <option value="visi" {{ $row->kategori == 'visi' ? 'selected' : '' }}>Visi</option>
                                <option value="misi" {{ $row->kategori == 'misi' ? 'selected' : '' }}>Misi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="konten">Visi/Misi</label>
                            <textarea name="konten" id="summernote" class=" form-control text-start"
                                placeholder="Enter visi/misi" rows="10">
                               {{ $row->konten }}
                                                              </textarea>
                            {{-- <small class="form-text text-muted">Separate each point with a new line and use • for
                                bullet
                                points.</small> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($visi as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus visimisin</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-visimisi-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus Data Ini?</p>
                            <h5>Detail Data</h5>
                             <table class="table table-bordered">
                                <tr>
                                    <th>Kategori</th>
                                    <td>{{ $row->kategori }}</td>
                                </tr>
                                <tr>
                                    <th>Isi</th>
                                    <td style="white-space: pre-wrap;">{{ $row->konten }}</td>
                                </tr>
                            </table>
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
    @endforeach

</section>
@section('script')
{{-- cdn dataable --}}
<script src='https://cdn.datatables.net/2.0.8/js/dataTables.js'> </script>
<script>
    $(document).ready(function () {
        // datatabel
        new DataTable('#example');
    });

    // point bullet di textarea
    $('#konten').keydown(function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            const cursorPos = this.selectionStart;
            const textBefore = $(this).val().substring(0, cursorPos);
            const textAfter = $(this).val().substring(cursorPos);
            $(this).val(textBefore + '\n• ' + textAfter);
            this.selectionEnd = cursorPos + 3; 
        }
    });

//     // Summernote
//    $('#summernote').summernote({
//     height: 200, // set the height of the editor
//     placeholder: 'Enter visi/misi',
//     });
    
//     // Handle form submission
//     $('form').on('submit', function() {
//     var htmlContent = $('#summernote').val();
//     var plainText = convertHtmlToPlainText(htmlContent);
//     $('#summernote').val(plainText);
//     });
    
//     function convertHtmlToPlainText(htmlContent) {
//     var tempDiv = document.createElement('div');
//     tempDiv.innerHTML = htmlContent;
//     var plainText = '';
    
//     function traverseNodes(node) {
//     if (node.nodeType === 3) { // Text node
//     plainText += node.nodeValue.trim();
//     } else if (node.nodeType === 1) { // Element node
//     switch (node.tagName) {
//     case 'P':
//     plainText += node.innerText.trim() + '\n\n';
//     break;
//     case 'LI':
//     plainText += '• ' + node.innerText.trim() + '\n';
//     break;
//     case 'OL':
//     Array.from(node.children).forEach(function(li) {
//     plainText += (Array.from(node.children).indexOf(li) + 1) + '. ' + li.innerText.trim() + '\n';
//     });
//     break;
//     case 'UL':
//     Array.from(node.children).forEach(function(li) {
//     plainText += '• ' + li.innerText.trim() + '\n';
//     });
//     break;
//     default:
//     Array.from(node.childNodes).forEach(traverseNodes);
//     break;
//     }
//     }
//     }
    
//     Array.from(tempDiv.childNodes).forEach(traverseNodes);
//     return plainText.trim();
//     }
    

    
</script>

@endsection