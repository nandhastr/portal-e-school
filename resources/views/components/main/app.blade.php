<x-partials.header></x-partials.header>
<x-top></x-top>

@if(!request()->is('album','alumni','struktur-organisasi','sejarah','visi','tendik','program','siswa','article-berjualan','article-marketing','article-bisnis','keg-uks','keg-osis','keg-pramuka'))
<x-carousel-banner></x-carousel-banner>
@endif
<x-partials.navbar {{ $attributes }}></x-partials.navbar>

{{ $slot }}

<x-partials.footer></x-partials.footer>