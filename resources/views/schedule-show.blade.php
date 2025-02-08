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
                    <h3 class="text-lg font-bold mb-4">{{ $schedule->event_name }}</h3>
                    <p><strong>Start Date:</strong> {{ $schedule->start_date }}</p>
                    <p><strong>End Date:</strong> {{ $schedule->end_date }}</p>
                    <a href="{{ route('todo-list') }}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
