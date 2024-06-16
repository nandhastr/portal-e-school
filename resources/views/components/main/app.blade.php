<x-partials.header></x-partials.header>
<x-top></x-top>

@if (!request()->is('album','alumni'))
<x-carousel-banner></x-carousel-banner>
@endif
<x-partials.navbar {{ $attributes }}></x-partials.navbar>

{{ $slot }}

<x-partials.footer></x-partials.footer>