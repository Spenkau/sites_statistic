<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создание страницы') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('site.page.store', ['site' => $site]) }}" style="display:flex; justify-content: center; align-items: center; flex-direction: column; gap: 20px;">
        @csrf
        @method('POST')
        <div>
            <label for="url">URL: </label>
            <input type="text" placeholder="URL" name="url" id="url" value="{{ old('url') }}">
        </div>

        <div>
            <label for="threshold_speed">Порог: </label>
            <input type="text" placeholder="Порог скорости" name="threshold_speed" id="threshold_speed" value="{{ old('threshold_speed') }}">
        </div>

        <div>
            <label for="comment">Комментарий: </label>
            <textarea name="comment" id="comment" placeholder="Комментарий"></textarea>
        </div>

{{--        <input type="hidden" name="site_id" value="{{ $site->id }}">--}}

        <button type="submit">Создать</button>
    </form>
</x-app-layout>
