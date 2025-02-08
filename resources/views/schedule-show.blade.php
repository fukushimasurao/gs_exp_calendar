<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Schedule Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-bold mb-4">{{ $schedule->event_name }}</h2>
                    <p class="mb-2"><strong>Start Date:</strong> {{ $schedule->start_date }}</p>
                    <p class="mb-2"><strong>End Date:</strong> {{ $schedule->end_date }}</p>
                    <div class="mb-4"><strong>Details:</strong></div>
                    <div class="mb-4">{!! nl2br(e($schedule->details)) !!}</div>
                    <div class="mt-4">
                        <a href="{{ route('schedules.edit', $schedule->id) }}">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">編集</button>
                        </a>
                        <a href="{{ route('todo-list') }}">
                            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">戻る</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
