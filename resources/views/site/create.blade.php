<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создание сайта') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('site') }}" class="d-flex justify-content-center align-items-center flex-column gap-5">
        @csrf
        @method('POST')

        <div>
            <label for="name">Название: </label>
            <input type="text" placeholder="Название сайта" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="url">URL: </label>
            <input type="text" placeholder="URL" name="url" id="url" value="{{ old('url') }}">
        </div>

        <div>
            <label for="comment">Комментарий: </label>
            <textarea name="comment" id="comment" placeholder="Комментарий"></textarea>
        </div>

        <button type="submit">Создать</button>
    </form>
</x-app-layout>
