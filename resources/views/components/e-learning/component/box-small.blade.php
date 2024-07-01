{{-- dashboard box-small --}}
<!-- Small boxes (Stat box) -->

{{-- ini dashboard untuk siswa --}}
@if($user->role !== 'admin' && $user->role !== 'guru')
<x-e-learning.component.dashboard-siswa :kelas="$kelas" :user="$user" :penghargaan="$penghargaan" :siswa="$siswa"
    :nilai="$nilai" :kegiatan="$kegiatan"> </x-e-learning.component.dashboard-siswa>
@endif
{{-- dashboard admin --}}
@if($user->role !== 'siswa' && $user->role !== 'guru')
<x-e-learning.component.dashboard-admin :user="$user" :siswa="$siswa" :alumni="$alumni" :guru="$guru">
</x-e-learning.component.dashboard-admin>

@endif
{{-- dashboard guru --}}
@if($user->role !== 'siswa' && $user->role !== 'admin')
<x-e-learning.component.dashboard-guru></x-e-learning.component.dashboard-guru>
@endif