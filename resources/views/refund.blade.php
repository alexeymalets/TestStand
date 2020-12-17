<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{route('refund.store', $win)}}">
                @csrf
                <input name="card" type="text" placeholder="440000000000" required>
                <button>Вывести</button>
            </form>
        </div>

    </div>
</x-app-layout>
