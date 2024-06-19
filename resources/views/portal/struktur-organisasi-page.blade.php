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
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <img src="{{ asset('assets/img/user1.jpg') }}" alt="Foto 1" class="card-img-top "
                                        style="width: 5em;">
                                </td>
                                <td>Kepala Sekolah</td>
                                <td>Nama Kepala Sekolah</td>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    <img src="path_to_photo2.jpg" alt="Foto 2" class="card-img-top">
                                </td>
                                <td>Wakil Kepala Sekolah</td>
                                <td>Nama Wakil Kepala Sekolah</td>
                            </tr>
                            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-main.app>