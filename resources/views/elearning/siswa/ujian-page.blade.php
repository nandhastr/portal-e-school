<x-e-learning.master.layout :title="$title" :user="$user">
    <hr class="border">
    <div class="container-fluid bg-white h-100">
        <div class="row">
            <h5 class="text-red fw-bold"><i class="fa-solid fa-triangle-exclamation text-red"></i> Jenis Ujian!
            </h5>
            <small class="text-sm"><i>*Jangan sampai salah pilih ya</i></small>
            <ul class="nav nav-treeview px-4">
                <li class="nav-item">
                    <form id="formJenisUjian">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisUjian" id="uts" value="UTS">
                                    <label class="form-check-label" for="uts">
                                        <x-nav-link href="" class="nav-link">
                                            <p>UTS</p>
                                        </x-nav-link>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisUjian" id="uas" value="UAS">
                                    <label class="form-check-label" for="uas">
                                        <x-nav-link href="" class="nav-link">
                                            <p>UAS</p>
                                        </x-nav-link>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenisUjian" id="un" value="UN">
                                    <label class="form-check-label" for="un">
                                        <x-nav-link href="" class="nav-link">
                                            <p>UN</p>
                                        </x-nav-link>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </form>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-6">
                <h6>Soal Pilihan Ganda</h6>
            </div>
            <div class="col-6">
                <h6 class="text-end">Durasi : 90 Menit</h6>
            </div>
        </div>
        <hr>
        <div class="row py-4">
            <div class="col-1">
                <h6>1.</h6>
            </div>
            <div class="col-auto">
                <h6>Pertanyaan</h6>
                <form id="formJawaban">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban1" id="jawaban1A" value="A">
                        <label class="form-check-label" for="jawaban1A">
                            A
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban1" id="jawaban1B" value="B">
                        <label class="form-check-label" for="jawaban1B">
                            B
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban1" id="jawaban1C" value="C">
                        <label class="form-check-label" for="jawaban1C">
                            C
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="jawaban1" id="jawaban1D" value="D">
                        <label class="form-check-label" for="jawaban1D">
                            D
                        </label>
                    </div>
                    <button class="btn mt-4 center" type="submit">Kirim Jawaban</button>
                </form>
            </div>
        </div>
    </div>
</x-e-learning.master.layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $("#formJawaban").submit(function(event) {
    event.preventDefault();
    var selectedJenisUjian = $('input[name="jenisUjian"]:checked').val();
    if(selectedJenisUjian) {
    var selectedJawaban = $('input[name="jawaban1"]:checked').val();
    if(selectedJawaban) {
    // Kirim data ujian dan jawaban ke server menggunakan AJAX
    console.log("Jenis Ujian:", selectedJenisUjian);
    console.log("Jawaban yang dipilih:", selectedJawaban);
    // Tambahkan logika untuk mengirim data ke server di sini
    } else {
    alert("Pilih salah satu jawaban terlebih dahulu.");
    }
    } else {
    alert("Pilih jenis ujian terlebih dahulu.");
    }
    });
    });
</script>