<x-partials.header></x-partials.header>


{{-- gambar slider --}}
@if(!request()->is('album','alumni','struktur-organisasi','about','visi','tendik','program','siswa','article-berjualan','article-marketing','article-bisnis','keg-uks','keg-osis','keg-pramuka'))
{{-- <x-carousel-banner :slide="$slide"></x-carousel-banner>x --}}
<x-carousel-banner></x-carousel-banner>
@endif
<x-partials.navbar {{ $attributes }}></x-partials.navbar>
{{ $slot }}


<x-partials.footer></x-partials.footer>