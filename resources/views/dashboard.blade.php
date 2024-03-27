<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ваши сайты') }}
        </h2>
        <div>
            <a class="checkup btn btn-danger" disabled href="{{ route('check.site') }}">Запустить проверку сайтов</a>
            <a class="checkup btn btn-danger" href="{{ route('check.api') }}">Запустить проверку API</a>
        </div>
        <div>
            <a href="{{ route('site.party') }}" class="btn btn-primary mx-3">
                Совместные сайты
            </a>
            <a href="{{ route('site.create') }}" class="btn btn-primary">Создать новый</a>
        </div>
    </x-slot>
    @if(session()->has('status')) {{ session()->get('status') }} @endif

    <ul class="list-unstyled m-5" id="sites-list">
        @if(empty($sites) || count($sites) <= 0)
            <li><h1>По вашему запросу ничего не найдено</h1></li>
        @else
            @foreach($sites as $site)
                <li class="position-relative d-flex border-dark border-1 rounded-3 flex-column gap-3 mb-4 p-4">
                    <div class="d-flex justify-content-between">
                        <a class="text-dark" href="{{ route('site.page.index', $site->id) }}">{{ $site->id }}
                            | {{ $site->name }}</a>
                        <span class="p-4">Дата создания: {{ $site->created_at }}</span>
                    </div>
                    <p>
                        <span class="fw-bold">URL: </span>
                        <a class="text-dark" href="{{ $site->url }}" target="_blank">{{ $site->url }}</a>
                    </p>
                    <p>
                        <span class="fw-bold">Комментарий:</span>
                        {{ strlen($site->comment) > 40 ? mb_substr($site->comment, 0, 40) . '...' : $site->comment}}
                    </p>


                    @if(count($site->pages) > 0)
                        <ul class="list-group-flush">
                            Страницы:
                            @foreach($site->pages as $page)
                                <li>
                                    <p>URL: {{ $page->url }}</p>
                                    <p>Порог: {{ $page->threshold_speed }} миллисекунд</p>
                                    <p>
                                        Комментарий:
                                        {{
                                            strlen($page->comment) > 40 ?
                                            mb_substr($page->comment, 0, 40) . '...' :
                                            $page->comment
                                        }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="position-absolute" style="bottom: 20px; right: 20px;">
                        <a
                            class="link-dark"
                            href="{{ route('site.edit', $site->id) }}"
                            style="margin-right: 10px;">
                            Изменить
                        </a>
                        <input type="hidden" value="{{ $site->id }}" id="site_id">
                        <button
                            class="delete-btn link-dark"
                            data-id="{{ $site->id }}">
                            Удалить
                        </button>
                    </div>
                </li>
            @endforeach
            <div class="d-flex justify-content-center">
                {{ $sites->appends(request()->query())->links() }}
                {{--        {{ $sites->links('layouts.pagination') }}--}}
            </div>
        @endif
    </ul>
    @section('script')
        <script>
            const sitesList = document.getElementById('sites-list');
            const deleteBtn = document.querySelector('.delete-btn');

            sitesList.addEventListener('click', (event) => {
                if (event.target.classList.contains('delete-btn')) {
                    const siteId = event.target.getAttribute('data-id');
                    axios.delete(`/site/${siteId}`);
                }
            })
        </script>
    @endsection
</x-app-layout>
