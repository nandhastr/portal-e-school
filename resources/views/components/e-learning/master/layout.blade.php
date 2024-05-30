<x-partials.header :title="$title"></x-partials.header>
<x-e-learning.partials.navbar></x-e-learning.partials.navbar>
<x-e-learning.partials.sidebar></x-e-learning.partials.sidebar>

{{-- content --}}
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper " id="theme-container">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- disini nama judul halaman --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{ $slot }}
        </div>
    </section>
</div>


<x-e-learning.partials.footer></x-e-learning.partials.footer>