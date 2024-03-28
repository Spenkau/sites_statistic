<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ваши сайты') }}
        </h2>
        <div id="checkup_section">
            <button class="checkup btn btn-danger" data-route="site" href="{{ route('check.site') }}">Запустить проверку сайтов <span></span></button>
            <button class="checkup btn btn-danger" data-route="api" href="{{ route('check.api') }}">Запустить проверку API <span></span></button>
        </div>
        <div>
            <a href="{{ route('site.party') }}" class="btn btn-primary mx-3">
                Совместные сайты
            </a>
            <a href="{{ route('site.create') }}" class="btn btn-primary">Создать новый</a>
        </div>
    </x-slot>

    <x-filter-form :fields="[
            ['name' => 'name', 'label' => 'Название сайта', 'type' => 'text'],
            ['name' => 'url', 'label' => 'URL сайта', 'type' => 'text'],
            ['name' => 'comment', 'label' => 'Комментарий', 'type' => 'text'],
            ['name' => 'created_at', 'label' => 'Дата создания', 'type' => 'datetime-local'],
        ]">
    </x-filter-form>

    <ul class="list-unstyled m-5" id="sites-list">
        @if(!empty($sites) && count($sites) > 0)
            @foreach($sites as $site)
                <li class="position-relative d-flex border-dark border-1 rounded-3 flex-column gap-3 mb-4 p-4">
                    <div class="d-flex justify-content-between">
                        <a class="text-dark" href="{{ route('site.page.index', $site->id) }}">
                            {{ $site->id }} | {{ $site->name }}
                        </a>
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
        @else
            <li><h1>По вашему запросу ничего не найдено</h1></li>
        @endif
    </ul>
    @section('script')
        <script>
            const sitesList = document.getElementById('sites-list');
            const deleteBtn = document.querySelector('.delete-btn');
            const checkBtns = document.querySelectorAll('.checkup');
            const checkupBlock = document.getElementById('checkup_section');

            sitesList.addEventListener('click', (event) => {
                if (event.target.classList.contains('delete-btn')) {
                    const siteId = event.target.getAttribute('data-id');
                    axios.delete(`/site/${siteId}`)
                        .then(() => alert('Сайт удален. Обновите страницу'));
                }
            })

            checkupBlock.addEventListener('click', (event) => {
                if (event.target.classList.contains('checkup')) {
                    const button = event.target;
                    const route = event.target.getAttribute('data-route')
                    checkup(button, route);
                }
            })

            function checkup(button, route) {
                button.disabled = true;
                const countdownElement = button.firstElementChild;
                showCountdown(countdownElement);


                fetch(`check/${route}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(res => res.json())
                    .then((data) => {
                        alert(data.message);

                        setTimeout(() => {
                            button.disabled = false;
                        }, 10000)
                    })
            }

            function showCountdown(countdownElement) {
                let countdown = 10;
                const intervalId = setInterval(() => {
                    if (countdown > 0) {
                        countdownElement.innerText = `(${countdown})`;
                    } else {
                        countdownElement.innerText = '';
                        clearInterval(intervalId);
                    }
                    countdown--;
                }, 1000);
            }
        </script>
    @endsection
</x-app-layout>
