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
        @if($type->name == 'money')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div>
                    Перечислить в банк
                </div>
                <div>
                    <from>
                        Номер карты
                        <input type="text" placeholder="4400 0000 0000 0000">
                    </from>
                </div>
            </div>
        @elseif($type->name == 'bonus')
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                Бонусные баллы зачислены на Ваш счет
            </div>
        @endif

    </div>
</x-app-layout>
