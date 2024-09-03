<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid mt-5 mb-4">
        <x-hr-gradient>
            Kepengurusan Sekolah SMK PGRI PAMIJAHAN BOGOR
        </x-hr-gradient>
        @if ($struktur->isNotEmpty())
        <div class="row mb-4 ">
            <div class="col">
                <div class=" card-body card-outline card-success mt-3">
                    <table class="table table-bordered w-100 ">
                        <thead>
                            <tr class="text-center">
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

        @else
        <x-image-not-data></x-image-not-data>
        @endif
    </div>
</x-main.app>