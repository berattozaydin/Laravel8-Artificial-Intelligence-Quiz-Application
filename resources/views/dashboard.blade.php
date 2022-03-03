<x-app-layout>
    <x-slot name="header">
Anasayfa
    </x-slot>
@if(auth()->user()->type=='teacher')
    <!-- Account Management -->
        <div class="block px-4 py-2 text-xs text-gray-400">
            Quiz İşlemleri
        </div>

        <x-jet-dropdown-link href="{{ route('quizzes.index') }}">
            Quizler
        </x-jet-dropdown-link>
    @endif
</x-app-layout>
