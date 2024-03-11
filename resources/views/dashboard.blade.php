<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ваши сайты') }}
        </h2>
        <a href="/site/create" class="text-xl text-gray-800 dark:text-gray-200 border-gray-100">Создать новый</a>
    </x-slot>

    {{--    @dump($sites)--}}
    <ul class="list-unstyled" style="margin: 20px">
        @foreach($sites as $site)
            <li style="position: relative; border: 1px solid black; border-radius: 20px; display: flex; flex-direction: column; gap: 5px; margin-bottom: 20px; padding: 20px">
                <div style="display: flex; justify-content: space-between">
                    <a href="/site/{{ $site->id }}">{{ $site->id }} | {{ $site->name }}</a>
                    <span style="padding: 20px">Дата создания: {{ $site->created_at }}</span>
                </div>

                <p><b>URL: </b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></p>

                <p>
                    <b>Комментарий:</b>{{ strlen($site->comment) > 40 ? mb_substr($site->comment, 0, 40) . '...' : $site->comment}}
                </p>


                @if(count($site->pages) > 0)
                    <ul>
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

                <div style="position: absolute; bottom: 20px; right: 20px;">
                    <a href="/site/{{ $site->id }}/edit" style="margin-right: 10px;">Изменить</a>
                    <input type="hidden" value="{{ $site->id }}" id="site_id">
                    <button
                        class="delete-btn"
                        style="border: none; outline: none; background-color: white; cursor: pointer"
                        data-id="{{ $site->id }}"
                    >
                        Удалить
                    </button>
                </div>
            </li>
        @endforeach
        {{ $sites->links('layouts.pagination') }}
    </ul>
</x-app-layout>
