<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Совместные сайты') }}
        </h2>
    </x-slot>

    @if ($sites && count($sites) == 0)
        <h1 class="text-center">Вы не являетесь участником ни одного сайта!</h1>
    @else
        <ul class="list-unstyled m-5" id="sites-list">
            @foreach($sites as $site)
                <li class="position-relative d-flex border-dark border-1 rounded-3 flex-column gap-3 mb-4 p-4">
                    <div class="d-flex justify-content-between">
                        <a class="text-dark" href="/site/{{ $site->id }}">{{ $site->id }} | {{ $site->name }}</a>
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
                                        {{ strlen($page->comment) > 40 ?
                                             mb_substr($page->comment, 0, 40) . '...' :
                                             $page->comment }}
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="position-absolute" style="bottom: 20px; right: 20px;">
                        <a class="link-dark" href="/site/{{ $site->id }}/edit" style="margin-right: 10px;">Изменить</a>
                        <input type="hidden" value="{{ $site->id }}" id="site_id">
                        <button
                            class="delete-btn link-dark"
                            data-id="{{ $site->id }}"
                        >
                            Удалить
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $sites->links('layouts.pagination') }}
    @endif

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
</x-app-layout>
