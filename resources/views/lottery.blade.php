<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>{{$type->name}}</div>
            @if($type->name == 'object')
                <div>{{$prize->name}}</div>
            @else
                {{$prize}}
            @endif
        </div>
    </div>
</x-app-layout>
