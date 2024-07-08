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
                        {{-- tabel mata pelajaran dashboard admin --}}

                        <table id="example" class="display table-hover text-xs" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Title</th>
                                    <th>Mulai</th>
                                    <th>Berakhir</th>
                                    <th>Kode Warna</th>
                                    <th>Warna Garis</th>
                                    <th>aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($event))
                                @foreach ($event as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td>{{ $row->start }}</td>
                                    <td>{{ $row->end }}</td>
                                    <td style="background-color: {{$row->backgroundColor}}">{{ $row->backgroundColor }}
                                    </td>
                                    <td style="border: 4px solid {{$row->borderColor}}">{{$row->borderColor }}</td>
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
                                <p>tidak ada event</p>
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
                    <h4 class="modal-title">Tambah Event </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-event-store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">judul event</label>
                            <input type="text" name="title" id="title" class="form-control" required
                                placeholder="Enter title event">
                        </div>
                        <div class="form-group">
                            <label for="backgroundColor">Kode Warna</label>
                            <input type="color" name="backgroundColor" id="backgroundColor" class="form-control"
                                placeholder="Pilih backgroundColor" required>
                        </div>
                        <div class="form-group">
                            <label for="borderColor">Garis Warna</label>
                            <input type="color" name="borderColor" id="borderColor" class="form-control"
                                placeholder="Pilih borderColor" required>

                        </div>
                        <div class="form-group">
                            <label for="start">Mulai :</label>
                            <input type="datetime-local" name="start" id="start" class="form-control"
                                placeholder="Pilih start" required>
                        </div>
                        <div class="form-group">
                            <label for="end">Berakhir :</label>
                            <input type="datetime-local" name="end" id="end" class="form-control"
                                placeholder="Pilih end" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @foreach ($event as $row)
    {{-- Modal update --}}
    <div class="modal fade" id="modal-update_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-event-update', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">judul event</label>
                            <input type="text" name="title" id="title" class="form-control" required
                                placeholder="Enter title event" value="{{$row->title}}">
                        </div>
                        <div class="form-group">
                            <label for="backgroundColor">Kode Warna</label>
                            <input type="color" name="backgroundColor" id="backgroundColor" class="form-control"
                                placeholder="Pilih backgroundColor" value="{{$row->backgroundColor}}">
                        </div>
                        <div class="form-group">
                            <label for="borderColor">Garis Warna</label>
                            <input type="color" name="borderColor" id="borderColor" class="form-control"
                                placeholder="Pilih borderColor" value="{{$row->borderColor}}">

                        </div>
                        <div class="form-group">
                            <label for="start">Mulai :</label>
                            <input type="datetime-local" name="start" id="start" class="form-control"
                                placeholder="Pilih start" required value="{{$row->start}}">
                        </div>
                        <div class="form-group">
                            <label for="end">Berakhir :</label>
                            <input type="datetime-local" name="end" id="end" class="form-control" placeholder="Pilih end"
                                required value="{{$row->end}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah event</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- Modal delete --}}
    @foreach ($event as $row)
    <div class="modal fade" id="modal-delete_{{ $row->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus event</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('data-event-delete', ['id' => $row->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus event Ini?</p>
                            <h5>Detail Data</h5>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Judul event</th>
                                    <td>{{ $row->title }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal mulai event</th>
                                    <td>{{ $row->start }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal berakhir event</th>
                                    <td>{{ $row->end }}</td>
                                </tr>
                                <tr>
                                    <th>Kode warna event</th>
                                    <td style="background-color: {{ $row->backgroundColor }}">{{ $row->backgroundColor }}</td>
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
</script>

@endsection