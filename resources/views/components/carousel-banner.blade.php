<div id="carouselExampleInterval" class="carousel slide fixed-carousel" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <x-image-link class="img-fluid img-slide" src="{{ asset('assets/img/banner.jpg') }}"></x-image-link>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <x-image-link class="img-fluid img-slide" src="{{ asset('assets/dist/img/photo1.png') }}">
            </x-image-link>
        </div>
        <div class="carousel-item">
            <x-image-link class="img-fluid img-slide" src="{{ asset('assets/dist/img/avatar3.png') }}">
            </x-image-link>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
    .carousel {
        height: 40rem !important;

    }

    .img-slide {
        height: 40rem;
    }
</style>