<x-main.app class="navbar navbar-expand-lg ">
    <div class="container container-fluid mt-4 p-4">
        <x-hr-gradient>
            <h2 class="fw-bold">Visi & Misi</h2>
        </x-hr-gradient>
        @if ($visi && $misi -> isNotEmpty())
        <div class="row mt-3">
            {{-- visi --}}
            @if ($visi)
            @foreach ($visi as $vis)
            <div class="col col-12">
                <h3 class=" text-uppercase">{{ $vis->kategori }}</h3>
                <p clas="text-justify p-visi">
                    {{ $vis->konten}}
                </p>
            </div>
            @endforeach
            @else
            data kosong
            @endif

            {{-- misi --}}
            @if ($misi && $misi->count() > 0)
            <div class="col-12 mt-3">
                <ol class="list-misi">
                    <h3 class=" text-uppercase">misi</h3>
                    @foreach ($misi as $index => $mis)
                    <li>
                        <p class="text-justify p-misi">
                            {{ $mis->konten }}
                        </p>
                    </li>
                    @endforeach
                </ol>
            </div>
            @else
            <x-image-not-data></x-image-not-data>
            @endif
            @else
            <p>Data visi atau misi kosong</p>
            @endif

        </div>
</x-main.app>