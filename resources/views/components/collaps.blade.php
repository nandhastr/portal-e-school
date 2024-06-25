<div class="d-flex justify-content-center align-items-center mb-2">
  <button class="btn btn-outline-info btn-show-data-alumni" type="button" data-bs-toggle="collapse"
    data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Lihat Data
  </button>
</div>
<div class="collapse" id="collapseExample">
  <div class="d-flex justify-content-center align-items-center">
    @if($countAlumni)
    <h4 class="m-4">{{number_format($countAlumni)}}</h4>
    @else
    <h5 class="m-4">{{__('Tidak ada data alumni')}}</h5>
    @endif
  </div>
</div>