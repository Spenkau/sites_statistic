<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white">
            {{ __('Подробности страницы') }}
        </h2>
        <div class="d-flex gap-3">
            <a href="{{ route('site.page.edit', ['site' => $site, 'page' => $page]) }}" class="link-light">Изменить страницу</a>

            <form action="{{ route('site.page.destroy', ['site' => $site, 'page' => $page]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="link-light">Удалить страницу</button>
            </form>
        </div>
    </x-slot>
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
@if(isset($details->error))
{{ $details->error }}
@endif
</pre>
            </li>
        @endforeach
    </ul>
</x-app-layout>
