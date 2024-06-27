<!-- resources/views/alumni/index.blade.php -->

<x-main.app class="navbar navbar-expand-lg ">
    {{-- container album --}}
    <div class="container container-fluid " style="height: 100vh">
        <div class="col-12">
            <x-hr-gradient>
                Alumni
            </x-hr-gradient>
        </div>
        <div class="row justify-content-center align-items-center mb-2">
            <div class="col-md-6 col-sm-12 text-center">
                <select class="btn btn-outline-success btn-option-album" name="year" id="yearSelect">
                    <option value="">Pilih Tahun</option>
                    @for ($year = 1990; $year <= date('Y'); $year++) <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                </select>
            </div>
        </div>
        <x-collaps :countAlumni='$countAlumni'></x-collaps>
        <div class="row">
            @forelse ($alumni as $alum)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="{{ asset('assets/img/alumni/' . $alum->gambar) }}" class="img-fluid card-img-top p-4">
                    <hr>
                    <div class="card-body">
                        <h6 class="text-center">Tahun Lulus : {{ $alum->tahun_lulus }}</h6>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <p class="text-center">Tidak ada data alumni untuk tahun yang dipilih.</p>
            </div>
            @endforelse
        </div>
    </div>
</x-main.app>

@section('script')
<script>
    $(document).ready(function(){
        $('#yearSelect').on('change', function() {
            const year = $(this).val();
            if (year) {
                window.location.href = `/filter-data-alumni/${year}`;
            } else {
                window.location.href = '/alumni';
            }
        });
    });
</script>
@endsection