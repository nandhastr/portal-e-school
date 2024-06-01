<x-partials.header :title="$title"></x-partials.header>
<x-e-learning.partials.navbar></x-e-learning.partials.navbar>
<x-e-learning.partials.sidebar></x-e-learning.partials.sidebar>

{{-- content --}}
<!-- Content Wrapper. Contains page content -->
<x-e-learning.partials.header-content>
    <div class="col-sm-6">
        <span class="text-md fw-bold text-light">{{ 'Dashboard' }} /
            <span class="breadcrumb-item active fw-normal">{{ $title }}</li></span>
        </span>
        @if (!request()->is('e-learning'))
        <x-e-learning.component.button-back></x-e-learning.component.button-back>
        @endif
    </div><!-- /.col -->
</x-e-learning.partials.header-content>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        {{ $slot }}
    </div>
</section>
</div>


<x-e-learning.partials.footer></x-e-learning.partials.footer>