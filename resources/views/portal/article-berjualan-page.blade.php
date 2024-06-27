<x-main.app class="navbar navbar-expand-lg fixed-top">
    <div class="container container-fluid mt-4 ">
        @if ($)

        @else

        @endif
        <div class="row">
            <div class="col col-lg-10 col-md-10 col-sm-12">
                <h2 class="h-berjualan">Tips Berjualan</h2>
                <p class="mb-5 p-berjualan">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet eveniet aut deleniti quos,
                    voluptatem ipsa quisquam ratione eius quasi voluptatibus saepe doloremque? Totam, delectus
                    reprehenderit quia numquam esse illo omnis?
                </p>
            </div>
            <div class="col col-lg-2 col-md-2 col-sm-12">
                <x-image-link src="{{ asset('assets/dist/img/photo4.jpg') }}" id="img-articel-jualan" alt="">
                </x-image-link>
            </div>
        </div>
    </div>

</x-main.app>