<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Сайт') }}
            <test>
                <br>
                Владелец {{ $site->user->name }}
            </test>
        </h2>
        <a href="{{ route('site.page.create', ['site' => $site]) }}" class="text-xl text-gray-800 dark:text-gray-200 border-gray-100">Создать страницу</a>
    </x-slot>

    <h3>Подробности сайта {{ $site->name }}</h3>

    <details class="user-select-none">
        <summary>
            Детали сайта
        </summary>
        <ul class="list-group mb-4">
            <li>URL: <span>{{ $site->url }}</span></li>
            <li>Дата создания: {{ $site->created_at }}</li>
            <li><b>Комментарий: </b>{{ $site->comment }}</li>
        </ul>
    </details>

    <hr>

    @if(isset($site->pages) && count($site->pages) > 0)
        <ul class="list-group">
            Страницы:
            @foreach($site->pages as $page)
                <li class="list-group-item list-group-horizontal">
                    <p>URL: {{ $page->url }}</p>
                    <p>Порог: <code>{{ $page->threshold_speed }}</code> миллисекунд</p>
                    <p><span class="fw-bold">Комментарий: </span>{{ strlen($page->comment) > 40 ? mb_substr($page->comment, 0, 40) . '...' : $page->comment}}</p>
                    <a class="link-dark" href="{{ route('site.page.show', ['site' => $site, 'page' => $page]) }}">Перейти к деталям</a>
                </li>
            @endforeach
        </ul>
    @else
        <div style="display:flex; justify-content: center; align-items: center; flex-direction: column">
            <h2>Вы еще не добавляли страниц</h2>
            <a href="{{ route('site.page.create', ['site' => $site]) }}">Добавить</a>
        </div>
    @endif
</x-app-layout>


