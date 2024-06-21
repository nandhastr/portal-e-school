<x-e-learning.master.layout :title="$title" :user="$user" :mapel="$mapel" :siswa="$siswa" :kelas="$kelas"
    :penghargaan="$penghargaan" :kegiatan="$kegiatan" :tugas="$tugas :ruangKelas=" $ruangKelas">

    <hr class="border">
    <div class="row">
        <div class="col-auto">
            <div class="card bg-transparent border w-auto d-inline-block">
                <div class="card-body">
                    <h5 class="card-text">{{ 'Mata Pelajaran' }}</h5>
                    <hr>
                    <div class="row">
                        <div class="col-8">
                            <div class="col-8">
                                @foreach ($siswa->mapel as $mapel)
                                <a href="#" class="text-capitalize text-dark link-mapel hover" style="font-size: 10px">
                                    {{ $mapel->mata_pelajaran }}

                                </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="col-4">
                            <i class="fa-solid fa-chevron-right " style="font-size: 10px"></i>
                        </div>
                    </div>

                    <hr>
                </div>
            </div>
        </div>
        <div class="col modal-tugas">
            <div class="card bg-transparent border ">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="card " style="height: 5rem">
                                <h5 class="card-text bg-info px-2">{{ 'Materi' }}</h5>

                                <a class="btn mx-4" href="{{ asset('assets/doc/test.pdf') }}" download="test.pdf">
                                    Download Materi
                                </a>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-sm-6">
                            <div class="card  pb-2 " style="height: auto">
                                <h5 class="card-text bg-info px-2">{{ 'Tugas' }}</h5>
                                <h6 class="px-2">Tugas hari ini</h6>
                                <iframe class="px-2" src="{{ asset('assets/doc/test.pdf') }}" width="100%"
                                    height="300px">
                                    Browser Anda tidak mendukung iframe.
                                </iframe>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-sm-6">
                            <div class="card  " style="height:23rem">
                                <h5 class="card-text bg-info px-2">{{ 'Tugas Yang Anda Upload' }}</h5>
                                <h6></h6>
                                <form action="" method="POST" enctype="multipart/form-data" class="px-2">
                                    @csrf
                                    <input type="file" name="task_file" class="type">
                                    <button type="submit" class="btn btn-primary">Unggah</button>
                                </form>

                                <a href="" class="justify-content-center align-items-center d-flex" target="_blank">{{
                                    'nama file'
                                    }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card " style="height: auto">
                                <h5 class="card-text bg-info px-2">{{ 'Nilai' }}</h5>
                                <div class="row mb-4 px-2">
                                    <div class="col-3 px-2"><a href="" class="btn link-nilai-tugas">Tugas</a></div>
                                    <div class="col-3 px-2"><a href="" class="btn link-nilai-uts">UTS</a></div>
                                    <div class="col-3 px-2"><a href="" class="btn link-nilai-uas">UAS</a></div>
                                    <div class="col-3 px-2"><a href="" class="btn link-nilai-un">UN</a></div>
                                </div>
                                <div class="row modal-nilai-tugas" style="display: none">
                                    <div class="col col-12  ">
                                        <h6 class="px-2 fw-bold ">Nilai tugas</h6>
                                        <table class="table">
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai</th>
                                            <th>tanggal pelaksanaan</th>
                                            <tr>
                                                <td>Matematika</td>
                                                <td>90</td>
                                                <td>2022-02-02</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row modal-nilai-uts" style="display: none">
                                    <div class="col col-12  ">
                                        <h6 class="px-2 fw-bold ">Nilai UTS</h6>
                                        <table class="table">
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai</th>
                                            <th>tanggal pelaksanaan</th>
                                            <tr>
                                                <td>Matematika</td>
                                                <td>90</td>
                                                <td>2022-02-02</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row modal-nilai-uas" style="display: none">
                                    <div class="col col-12  ">
                                        <h6 class="px-2 fw-bold ">Nilai UAS</h6>
                                        <table class="table">
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai</th>
                                            <th>tanggal pelaksanaan</th>
                                            <tr>
                                                <td>Matematika</td>
                                                <td>90</td>
                                                <td>2022-02-02</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="row modal-nilai-un" style="display: none">
                                    <div class="col col-12  ">
                                        <h6 class="px-2 fw-bold ">Nilai UN</h6>
                                        <table class="table">
                                            <th>Mata Pelajaran</th>
                                            <th>Nilai</th>
                                            <th>tanggal pelaksanaan</th>
                                            <tr>
                                                <td>Matematika</td>
                                                <td>90</td>
                                                <td>2022-02-02</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>

    </div>
</x-e-learning.master.layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // modal mapel dan nilai
            $('.link-mapel').click(function (e) { 
                e.preventDefault();
            $('.modal-tugas').toggle('slow');
            });
            $('.link-nilai-tugas').click(function (e) { 
                e.preventDefault();
            $('.modal-nilai-tugas').toggle();
            $('.modal-nilai-uts').hide();
            $('.modal-nilai-uas').hide();
            $('.modal-nilai-un').hide();
            });
            $('.link-nilai-uts').click(function (e) { 
                e.preventDefault();
            $('.modal-nilai-uts').toggle();
            $('.modal-nilai-tugas').hide();
            $('.modal-nilai-uas').hide();
            $('.modal-nilai-un').hide();
            });
            $('.link-nilai-uas').click(function (e) { 
                e.preventDefault();
            $('.modal-nilai-uas').toggle();
            $('.modal-nilai-uts').hide();
            $('.modal-nilai-tugas').hide();
            $('.modal-nilai-un').hide();
            });
            $('.link-nilai-un').click(function (e) { 
                e.preventDefault();
            $('.modal-nilai-un').toggle();
            $('.modal-nilai-uts').hide();
            $('.modal-nilai-tugas').hide();
            $('.modal-nilai-uas').hide();
            });
        })
</script>