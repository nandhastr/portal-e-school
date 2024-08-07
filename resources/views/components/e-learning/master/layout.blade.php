<x-partials.header :title="$title"></x-partials.header>
<x-e-learning.partials.navbar></x-e-learning.partials.navbar>
<x-e-learning.partials.sidebar :user="$user" :komponen="$komponen"></x-e-learning.partials.sidebar>

<!-- content -->
<x-e-learning.partials.header-content>
    <div class="col-sm-6">
        <span class="text-md fw-bold text-dark">{{ 'Dashboard' }} /
            <span class="breadcrumb-item active fw-normal">{{ $title }}</span>
        </span>
    </div>
</x-e-learning.partials.header-content>

<section class="content">
    <div class="container-fluid">
        {{ $slot }}
    </div>
</section>

<x-e-learning.partials.footer></x-e-learning.partials.footer>