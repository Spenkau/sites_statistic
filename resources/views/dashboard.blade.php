<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ваши сайты') }}
        </h2>
        <div class="d-flex">
            <label for="mail" class="input-group text-white w-auto m-3">Почта</label>
            <input type="text" id="mail" class="input-group" value="kholyavskij@mail.ru">
            <button class="btn text-white" id="send-mail">Отправить</button>
        </div>
        <a href="/site/create" class="text-xl text-gray-800 dark:text-gray-200 border-gray-100">Создать новый</a>
    </x-slot>

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
                                    <b>Комментарий: </b>{{ strlen($page->comment) > 40 ? mb_substr($page->comment, 0, 40) . '...' : $page->comment}}
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

{{--    <x-modal name="confirm-site-deletion" focusable>--}}
{{--        <form method="post" action="{{ route('site') }}" class="p-6">--}}
{{--            @csrf--}}
{{--            @method('delete')--}}

{{--            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">--}}
{{--                {{ __('Вы уверены что хотите удалить сайт?') }}--}}
{{--            </h2>--}}

{{--            <div class="mt-6 flex justify-end">--}}
{{--                <x-secondary-button x-on:click="$dispatch('close')">--}}
{{--                    {{ __('Отменить') }}--}}
{{--                </x-secondary-button>--}}

{{--                <x-danger-button class="ms-3">--}}
{{--                    {{ __('Удалить') }}--}}
{{--                </x-danger-button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </x-modal>--}}
    <script>
        const sendMail = document.getElementById('send-mail');
        let mail = document.getElementById('mail');


        sendMail.addEventListener('click', async () => {
            const data = { email: mail.value, page: {'name': 'NamePage'} }

            console.log(mail.value)
            const result = await axios.post('/send-mail', data)
            //
            // const resData = await result.data;
            //
            // const writeResult = () => ({ mail: `${resData}`,  })
            //
            // writeResult();
        })

        // const modal = document.querySelector('[x-data][name="confirm-site-deletion"]');
        //
        // const data = JSON.parse(modal.getAttribute('x-data'));
        //
        // const showModal = false;
        const sitesList = document.getElementById('sites-list');
        const deleteBtn = document.querySelector('.delete-btn');

        sitesList.addEventListener('click', (event) => {
            if (event.target.classList.contains('delete-btn')) {
                // data.show = true;
                // modal.setAttribute('x-data', JSON.stringify(data));

                const siteId = event.target.getAttribute('data-id');

                axios.delete(`/site/${siteId}`);
            }
        })
    </script>
</x-app-layout>
