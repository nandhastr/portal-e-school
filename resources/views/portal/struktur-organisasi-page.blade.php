<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid" style="height: 100vh">
        <x-hr-gradient>
            Kepengurusan Sekolah SMK PGRI PAMIJAHAN BOGOR
        </x-hr-gradient>
        <div class="row mb-4">
            <div class="col">
                <div class="card-body">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Jabatan</th>
                                <th>Nama</th>
                            </tr>
                        </thead>

                        @if (!empty($struktur))
                        @foreach ($struktur as $row)
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/guru/' . $row->guru->gambar) }}" alt="Foto 1"
                                        class="card-img-top " style="width: 5em;">
                                </td>
                                <td>{{ $row->jabatan }}</td>
                                <td>{{ $row->guru->nama }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                        @else
                        Tidak ada Data
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-main.app>