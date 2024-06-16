<x-e-learning.master.layout :title="$title" :user="$user">
    {{-- box small untuk e-learning --}}
    {{--
    <x-e-learning.component.box-small :kelas="$kelas" :user="$user" :penghargaan="$penghargaan" :siswa="$siswa"
        :nilai="$nilai" :kegiatan="$kegiatan" /> --}}


    {{-- box small untuk portal informasi kegaiatan sekolah --}}
    <x-e-learning.component.box-small :user="$user"></x-e-learning.component.box-small>

</x-e-learning.master.layout>