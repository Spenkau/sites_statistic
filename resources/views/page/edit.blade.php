<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl m-0 py-3">
            {{ __('Изменить страницу') }}
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('site.page.update', ['site' => $site, 'page' => $page]) }}" style="display:flex; justify-content: center; align-items: center; flex-direction: column; gap: 20px;">
        @csrf
        @method('PUT')

        <div>
            <label for="url">URL: </label>
            <input type="text" placeholder="URL" name="url" id="url" value="{{ old('url', $page->url) }}">
        </div>

        <div>
            <label for="threshold_speed">Порог: </label>
            <input type="text" placeholder="Порог скорости" style="width: 70px" name="threshold_speed" id="threshold_speed" value="{{ old('threshold_speed', $page->threshold_speed) }}">
            миллисек.
        </div>

        <div>
            <label for="comment">Комментарий: </label>
            <textarea name="comment" id="comment" placeholder="Комментарий">{{ $page->comment }}</textarea>
        </div>

        <button type="submit">Изменить</button>
    </form>
</x-app-layout>
