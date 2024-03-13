<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Создание страницы') }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('site.page.store', ['site' => $site]) }}" class="d-flex justify-content-center align-items-center flex-column gap-5">
        @csrf
        @method('POST')
        <div>
            <label for="url">URL: </label>
            <input type="text" placeholder="Адрес страницы" name="url" id="url" value="{{ old('url') }}">
        </div>

        <div>
            <label for="threshold_speed">
                Порог
                <input type="text" class="w-25" name="threshold_speed" id="threshold_speed" value="{{ old('threshold_speed') }}">
                в миллисекундах
            </label>
        </div>

        <div>
            <label for="comment">Комментарий: </label>
            <textarea name="comment" id="comment" placeholder="Оставьте ваш комментарий к странице"></textarea>
        </div>

        <input type="hidden" name="site_id" value="{{ $site }}">

        <button type="submit">Создать</button>
    </form>
</x-app-layout>
