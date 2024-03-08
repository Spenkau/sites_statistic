@extends('layouts.app')

@section('content')
{{--    @dump($page)--}}
    <h1>Подробности страницы {{ $page->name }}</h1>

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
                </pre>
            </li>
        @endforeach
    </ul>
@endsection
