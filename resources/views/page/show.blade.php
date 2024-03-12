<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Подробности страницы') }}
        </h2>
        <a href="{{ route('site.page.edit', ['site' => $site, 'page' => $page]) }}" class="text-xl text-gray-800 dark:text-gray-200 border-gray-100">Изменить страницу</a>
        <a href="{{ route('site.page.edit', ['site' => $site, 'page' => $page]) }}" class="text-xl text-gray-800 dark:text-gray-200 border-gray-100">Удалить страницу</a>
    </x-slot>
{{--    @dump($page)--}}
    <h1>ID: {{ $page->id }}</h1>

    <ul class="list-unstyled">
        <li>URL: <a href="{{ $page->url }}">{{ $page->url }}</a></li>
        <li>Порог: {{ $page->threshold_speed }} миллисекунд</li>
        <li><b>Комментарий: </b>{{ $page->comment }}</li>
    </ul>

    <ul class="list-unstyled">
        @foreach($page->details as $key => $details)
            <li>
                <p>Проверка №{{ $key + 1 }}</p>
                <pre>
                    Статус-код: {{ $details->status_code }}
                    Время отклика: {{ $details->response_time }}
                    Время проверки: {{ $details->created_at }}
                </pre>
            </li>
        @endforeach
    </ul>
</x-app-layout>
