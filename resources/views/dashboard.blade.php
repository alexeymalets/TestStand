<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            У Вас бонусов: {{$user->bonus}}
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('lottery')}}">Получить приз</a>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <table>
                <tbody>
                    @foreach($user->wins()->get() as $win)
                        <tr>
                            <td>
                                {{$win->id}}
                            </td>
                            <td>
                                {{$win->type->name}}
                            </td>
                            <td>
                                @if($win->type->name == 'object')
                                    {{$win->prize->name}}
                                @else
                                    {{$win->value}}
                                @endif
                            </td>
                            <td>
                                @if($win->status == 0)
                                    @if($win->type->name == 'money')
                                        <a href="{{route('convert', $win)}}">Конвертировать</a> |
                                        <a href="{{route('refund', $win)}}">Вывести</a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
