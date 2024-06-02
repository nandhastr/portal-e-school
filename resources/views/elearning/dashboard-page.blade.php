<x-e-learning.master.layout :title="$title" :user="$user">
    @if($user->role !== 'admin' && $user->role !== 'guru')
    <x-e-learning.component.box-small :name="$name" :awards="$awards" />
    @endif
    {{-- disni konten admin --}}
</x-e-learning.master.layout>