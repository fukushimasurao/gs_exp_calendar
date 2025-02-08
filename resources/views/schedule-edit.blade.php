<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Schedule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
                        @csrf
                        @method('PATCH')

                        <div>
                            <label for="event_name">Event Name</label>
                            <input type="text" id="event_name" name="event_name" value="{{ $schedule->event_name }}" required>
                        </div>

                        <div>
                            <label for="start_date">Start Date</label>
                            <input type="date" id="start_date" name="start_date" value="{{ $schedule->start_date }}" required>
                        </div>

                        <div>
                            <label for="end_date">End Date</label>
                            <input type="date" id="end_date" name="end_date" value="{{ $schedule->end_date }}" required>
                        </div>

                        <div>
                            <label for="details">Details</label>
                            <textarea id="details" name="details" maxlength="1024">{{ $schedule->details }}</textarea>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">更新</button>
                            <a href="{{ route('schedules.show', $schedule->id) }}">
                                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">戻る</button>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
