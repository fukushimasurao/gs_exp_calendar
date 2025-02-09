<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gemini AI Response') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-bold mb-4">AIの回答</h2>

                    <!-- Markdown を HTML に変換して表示 -->
                    <div class="prose max-w-none">
                        {!! $response !!}
                    </div>

{{--                    <div class="mt-4">--}}
{{--                        <a href="{{ route('home') }}">--}}
{{--                            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-700">戻る</button>--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
