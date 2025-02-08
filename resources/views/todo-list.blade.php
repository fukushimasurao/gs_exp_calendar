<!-- resources/views/todo-list.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ToDo List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full bg-white">
                        <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">イベント名</th>
                            <th class="py-2 px-4 border-b">開始日</th>
                            <th class="py-2 px-4 border-b">終了日</th>
                            <th class="py-2 px-4 border-b">アクション</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($schedules as $schedule)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $schedule->event_name }}</td>
                                <td class="py-2 px-4 border-b">{{ $schedule->start_date }}</td>
                                <td class="py-2 px-4 border-b">{{ $schedule->end_date }}</td>
                                <td class="py-2 px-4 border-b">
                                    <a href="{{ route('schedules.show', $schedule->id) }}">
                                        <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">詳細</button>
                                    </a>
                                    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="ml-2 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
