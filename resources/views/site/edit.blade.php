<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Изменить сайт') }}
        </h2>
    </x-slot>

    <form method="POST" action="/site/{{ $site->id }}" style="display:flex; justify-content: center; align-items: center; flex-direction: column; gap: 20px;">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Название</label>
            <input type="text" placeholder="Название сайта" name="name" id="name" value="{{ old('name', $site->name) }}">
        </div>

        <div>
            <label for="url">URL</label>
            <input type="text" placeholder="URL" name="url" id="url" value="{{ old('url', $site->url) }}">
        </div>

        <div>
            <label for="comment">Комментарий</label>
            <textarea name="comment" id="comment" placeholder="Комментарий">{{ $site->comment }}</textarea>
        </div>

        <button type="submit">Изменить</button>
    </form>
</x-app-layout>
