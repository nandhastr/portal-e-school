<x-e-learning.master.layout :title="$title">
    <h2> {{ $title }}</h2>
    <hr class="border">
    <div class="row">
        <div class="col col-md-4 col-sm-6 ">
            <div class="card" style="width: 18rem;">
                <x-image-link src="{{ asset('assets/img/smk.png') }}"></x-image-link>
                <div class="card-body">
                    <hr>
                    <h3 class="card-text">Kelas X</h3>
                    <div class="row">
                        <div class="col-12">
                            <span class="text-capitalize">nilai UTS : 89</span>
                        </div>
                        <div class="col-12">
                            <span class="text-capitalize">nilai UAS : 78</span>
                        </div>
                    </div>
                    <hr>
                    <a href="{{ route('profile-class') }}" class="btn btn-info w-100 bg-sky-400">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col col-md-4 col-sm-6 ">
            <div class="card" style="width: 18rem;">
                <x-image-link src="{{ asset('assets/img/smk.png') }}"></x-image-link>
                <div class="card-body">
                    <hr>
                    <h3 class="card-text">Kelas XI</h3>
                    <div class="row">
                        <div class="col-12">
                            <span class="text-capitalize">nilai UTS : 89</span>
                        </div>
                        <div class="col-12">
                            <span class="text-capitalize">nilai UAS : 78</span>
                        </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-info w-100 bg-sky-400">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col col-md-4 col-sm-6 ">
            <div class="card" style="width: 18rem;">
                <x-image-link src="{{ asset('assets/img/smk.png') }}"></x-image-link>
                <div class="card-body">
                    <hr>
                    <h3 class="card-text">Kelas XII</h3>
                    <div class="row">
                        <div class="col-12">
                            <span class="text-capitalize">nilai UTS : 89</span>
                        </div>
                        <div class="col-12">
                            <span class="text-capitalize">nilai UAS : 78</span>
                        </div>
                        <div class="col-12">
                            <span class="text-capitalize">nilai UN : 78</span>
                        </div>
                    </div>
                    <hr>
                    <a href="#" class="btn btn-info w-100 bg-sky-400">Lihat</a>
                </div>
            </div>
        </div>
    </div>
</x-e-learning.master.layout>