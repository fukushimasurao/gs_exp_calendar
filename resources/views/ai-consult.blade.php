<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AI Consultation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">詳細内容をAIに相談しよう！</h3>
                    <form method="POST" action="{{ route('gemini.response') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="ai_query" class="block text-sm font-medium text-gray-700">相談内容</label>
                            <textarea id="ai_query" name="ai_query" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">相談する</button>
                        </div>
                    </form>

                    @isset($response)
                        <div class="mt-8">
                            <h3 class="text-lg font-bold mb-4">AIの回答</h3>
                            <div class="prose max-w-none">
                                {!! $response !!}
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
