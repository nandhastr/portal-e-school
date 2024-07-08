{{-- dashboard box-small --}}
<!-- Small boxes (Stat box) -->

{{-- ini dashboard untuk osis --}}
@if($user->role !== 'admin')
<x-e-learning.component.dashboard-siswa :kegiatan="$kegiatan" :user="$user" :siswa="$siswa" :alumni="$alumni" :guru="$guru"> </x-e-learning.component.dashboard-siswa>
@endif
{{-- dashboard admin --}}
@if($user->role !== 'osis' && $user->role !== 'guru')
<x-e-learning.component.dashboard-admin :user="$user" :siswa="$siswa" :alumni="$alumni" :guru="$guru">
</x-e-learning.component.dashboard-admin>

@endif
{{-- dashboard guru --}}
@if($user->role !== 'osis' && $user->role !== 'admin')
<x-e-learning.component.dashboard-guru></x-e-learning.component.dashboard-guru>
@endif