@extends('layouts.app')

@section('content')
    <a href="/pages">Создать новую страницу</a>

    <h4>Подробности сайта {{ $site->name }}</h4>

    <ul class="list-unstyled">
        <li>URL: <span>{{ $site->url }}</span></li>
        <li>Дата создания: {{ $site->created_at }}</li>
        <li><b>Комментарий: </b>{{ $site->comment }}</li>
    </ul>

    @if(isset($site->pages) && count($site->pages) > 0)
        <ul>
            Страницы:
            @foreach($site->pages as $page)
                <li>
                    <p>URL: {{ $page->url }}</p>
                </li>
                <li>
                    <p>Порог: {{ $page->threshold_speed }} миллисекунд</p>
                </li>
                <li>
                    <p><b>Комментарий: </b>{{ strlen($page->comment) > 40 ? mb_substr($page->comment, 0, 40) . '...' : $page->comment}}</p>
                    <a href="/page/{{ $page->id }}">Перейти к деталям</a>
                </li>
            @endforeach
        </ul>
    @else
        <h2>Вы еще не добавляли страниц</h2>
        <a href="/page/create">Добавить</a>
    @endif
@endsection
