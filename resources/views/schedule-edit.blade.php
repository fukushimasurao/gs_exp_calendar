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

                        <div>
                            <button type="submit">更新</button>
                        </div>
                    </form>
                    <a href="{{ route('schedules.show', $schedule->id) }}" class="text-blue-500 hover:text-blue-700 mt-4 inline-block">戻る</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
