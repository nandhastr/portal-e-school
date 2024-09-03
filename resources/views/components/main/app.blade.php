@if(!request()->is('/'))
<x-partials.header></x-partials.header>
@endif
<x-partials.navbar {{ $attributes }}></x-partials.navbar>

{{ $slot }}


<x-partials.footer></x-partials.footer>