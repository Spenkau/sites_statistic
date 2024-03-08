@extends('layouts.app')

@section('content')
    @dump($page)
{{--    <h1>Подробности страницы {{ $page->name }}</h1>--}}

{{--    <ul class="list-unstyled">--}}
{{--        <li>URL: <a href="{{ $page->url }}">{{ $page->url }}</a></li>--}}
{{--        <li>Порог: {{ $page->threshold_speed }} миллисекунд</li>--}}
{{--        <li><b>Комментарий: </b>{{ $page->comment }}</li>--}}
{{--    </ul>--}}

{{--    <ul class="list-unstyled">--}}
{{--        @foreach($page->details as $details)--}}
{{--            <li>Статус-код: {{ $details->status_code }}</li>--}}
{{--            <li>Время отклика: {{ $details->response_time }}</li>--}}
{{--            <li>Время проверки: {{ $details->created_at }}</li>--}}
{{--        @endforeach--}}
{{--    </ul>--}}
@endsection
