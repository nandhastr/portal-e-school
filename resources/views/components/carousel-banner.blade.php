@props(['slide'])

<!-- Carousel Wrapper -->
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @if(!empty($slide))
        @foreach($slide as $index => $row)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="3000">
            <img class="img-fluid d-block w-100 carousel-img img-banner"
                src="{{ asset('assets/img/gambarSlide/' . $row->gambar) }}" alt="Slide Image" style="height: 80vh;" />
        </div>
        @endforeach
        @else
        <div class="carousel-item active">
            <img class="img-fluid d-block w-100 carousel-img" src="{{ asset('assets/img/default.jpg') }}"
                alt="No data image" />
        </div>
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<style>
    .carousel-img {
        height: 50rem;
        object-fit: cover;
    }
</style>
