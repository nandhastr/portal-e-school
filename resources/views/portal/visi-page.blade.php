<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid " style="height: 100vh">
        <x-hr-gradient>
            Visi Dan Misi
        </x-hr-gradient>
        <div class="row">
            {{-- visi --}}
            @if ($visi)
            @foreach ($visi as $vis)
            <div class="col col-lg-6 col-md-6 col-12">
                <h2 class="fw-bold">{{ $vis->kategori }}</h2>
                <p clas="text-center">
                    {{ $vis->konten}}
                </p>
            </div>

            @endforeach
            @else
            data kosong
            @endif

            {{-- misi --}}
            @if ($misi)
            @foreach ($misi as $mis)
            <div class="col col-lg-6 col-md-6 col-12">
                <h2 class="fw-bold">{{ $mis->kategori }}</h2>
                <p clas="text-center">
                    {{ $mis->konten}}
                </p>
            </div>

            @endforeach
            @else
            data kosong
            @endif
        </div>
    </div>
</x-main.app>