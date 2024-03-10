<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Сайт') }}
        </h2>
        <a href="/site/create" class="text-xl text-gray-800 dark:text-gray-200 border-gray-100">Создать новый</a>
    </x-slot>

    <h3>Подробности сайта {{ $site->name }}</h3>

    <ul class="list-unstyled" style="padding-left: 20px; margin-bottom: 40px">
        <li>URL: <span>{{ $site->url }}</span></li>
        <li>Дата создания: {{ $site->created_at }}</li>
        <li><b>Комментарий: </b>{{ $site->comment }}</li>
    </ul>

    @if(isset($site->pages) && count($site->pages) > 0)
        <ul>
            Страницы:
            @foreach($site->pages as $page)
                <li>
                    <p>URL: {{ $page->url }}</p>
                </li>
                <li>
                    <p>Порог: {{ $page->threshold_speed }} миллисекунд</p>
                </li>
                <li>
                    <p><b>Комментарий: </b>{{ strlen($page->comment) > 40 ? mb_substr($page->comment, 0, 40) . '...' : $page->comment}}</p>
                    <a href="/page/{{ $page->id }}">Перейти к деталям</a>
                </li>
            @endforeach
        </ul>
    @else
        <div style="display:flex; justify-content: center; align-items: center; flex-direction: column">
            <h2>Вы еще не добавляли страниц</h2>
            <a href="/site/{{$site->id}}/page/create">Добавить</a>
        </div>
    @endif
</x-app-layout>
