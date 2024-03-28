<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white">
            {{ __('Подробности страницы') }}
        </h2>
        <div class="d-flex gap-3">
            <a href="{{ route('site.page.edit', ['site' => $site, 'page' => $page]) }}" class="link-light">Изменить
                страницу</a>

            <form action="{{ route('site.page.destroy', ['site' => $site, 'page' => $page]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="link-light">Удалить страницу</button>
            </form>
        </div>
    </x-slot>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">ID: {{ $page->id }}</h1>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">URL: <a href="{{ $page->url }}">{{ $page->url }}</a></li>
                    <li class="list-group-item">Порог: {{ $page->threshold_speed }} миллисекунд</li>
                    <li class="list-group-item">Комментарий: {{ $page->comment }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-5">
            @foreach($page->details as $key => $details)
                <div class="card mt-3">
                    <div class="card-header">
                        <p class="mb-0">Проверка №{{ $key + 1 }} от {{ $details->created_at }}</p>
                    </div>
                    <div class="card-body">
                        <p>Статус-код: {{ $details->status_code }}</p>
                        <p class="{{ $details->response_time < $page->threshold_speed ? 'text-danger' : 'text-success'}}">
                            Время отклика: {{ $details->response_time }}
                        </p>
                        @if(isset($details->error))
                            <p>Ошибка:</p>
                            <pre><code>{{ $details->error }}</code></pre>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
