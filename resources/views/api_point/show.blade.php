@php
    $request = json_decode($apiPoint->request_data)
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white">
            {{ __('Подробности API') . $apiPoint->name }}
        </h2>
    </x-slot>
    <h1>ID: {{ $apiPoint->id }}</h1>

    <ul class="list-unstyled">
        <li>URL: <a href="{{ $apiPoint->url }}">{{ $apiPoint->url }}</a></li>
        <li>Название: {{ $apiPoint->name }}</li>
        <li>Дата создания {{ $apiPoint->created_at }}</li>
        <li>
            Request:
            <code>
                {{ $apiPoint->request_data }}
{{--                {{ $request }}--}}
            </code>
        </li>
        <li>
            Response:
            <code>
                {{ $apiPoint->response_data }}
            </code>
        </li>
        <li>{{ $apiPoint->service }}</li>
    </ul>

    <ul class="list-unstyled">
        @foreach($apiPoint->api_history as $key => $apiHistory)
            <li>
                <p>Проверка №{{ $key + 1 }} от {{ $apiHistory->created_at }}</p>

<pre>
Статус-код: {{ $apiHistory->status_code }}
Время отклика: {{ $apiHistory->response_time }}
</pre>

            </li>
        @endforeach
    </ul>
</x-app-layout>
