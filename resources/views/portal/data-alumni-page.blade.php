<!-- resources/views/alumni/index.blade.php -->

<x-main.app class="navbar navbar-expand-lg">
    {{-- container album --}}
    <div class="container container-fluid mt-5" style="height: 100vh">
        <div class="col-12">
            <x-hr-gradient>
                Galeri Alumni
            </x-hr-gradient>
        </div>
        <div class="row justify-content-center align-items-center mb-2 mt-3">
            <div class="col-md-6 col-sm-12 d-flex text-center justify-content-center align-items-center">
                <form method="GET" action="{{ route('filter-alumni') }}">
                    <div class="form-group">
                        <select class="form-control" name="year" id="yearSelect" onchange="this.form.submit()">
                            <option value="" {{ request('year') ? '' : 'selected' }}>Lihat Semua</option>
                            @for ($year = 1990; $year <= date('Y'); $year++) <option value="{{ $year }}" {{
                                request('year')==$year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                        </select>
                    </div>
                </form>
            </div>
        </div>

        @if ($alumni->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <x-image-not-data></x-image-not-data>
            </div>
        </div>
        @else
        @if ($countAlumni > 0)
        <x-collaps :countAlumni='$countAlumni'></x-collaps>
        @endif
        <div class="row mx-2">
            @foreach ($alumni as $alum)
            <div class="col-md-2 col-sm-6 mb-2">
                <div class="card card-body card-outline border border-warning">
                    <img src="{{ asset('assets/img/alumni/' . $alum->gambar) }}"
                        class="img-fluid card-img-top img-alumni p-1" style="height: 8em;">
                    <a href="{{ asset('assets/img/alumni/' . $alum->gambar) }}" download="{{ $alum->judul }}"
                        class=" position-absolute" style="bottom: 5px; right: 5px;">
                        <i class="fa-solid fa-download text-sm text-info"></i>
                    </a>
                    <hr>
                    <h6 class="text-center">Tahun Lulus : {{ $alum->tahun_lulus }}</h6>

                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</x-main.app>