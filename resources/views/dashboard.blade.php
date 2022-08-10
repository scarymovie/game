<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf
                        <div>
                            <x-label for="name"/>Название

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus/>
                            <x-label for="category"/>Категория

                            <select name="category_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Создать') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@if(!empty(Auth::user()->question->first()))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                            <th>id</th>
                            <th>Название</th>
                            <th>Категория</th>
                        </thead>
                        @foreach($questions as $question)
                        <tbody>
                            <td>{{ $question->id }}</td>
                            <td>{{ $question->name }}</td>
                            <td>{{ $question->category->name }}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</x-app-layout>
