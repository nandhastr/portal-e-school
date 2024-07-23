@props(['slide'])

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        {{-- <div class="carousel-item active " data-bs-interval="5000">
            <img class="img-fluid d-block w-100 carousel-img" src="{{ asset('assets/img/banner.jpg') }}">
        </div> --}}
        @if(!empty($slide))   
        @foreach($slide as $index => $row)
        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="3000">
            <img class="img-fluid d-block w-100 carousel-img" src="{{ asset('assets/img/gambarSlide/' . $row->gambar) }}">
        </div>
        @endforeach
        @else
            <x-image-not-data></x-image-not-data>
        @endif
        {{-- <div class="carousel-item" data-bs-interval="3000">
            <img class="img-fluid d-block w-100 carousel-img" src="{{ asset('assets/dist/img/avatar3.png') }}">
            
        </div> --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<style>
    .carousel-img {
    height: 100px;
    object-fit: cover;
}

    </style>