@extends('layouts.app')

@section('content')
    <h1>Это главная страница</h1>
    @dump($sites)
    <ul class="list-unstyled">
        @foreach($sites as $site)
            <li style="border: 1px solid black; display: flex; flex-direction: column; gap: 5px; margin-bottom: 20px; padding: 20px">
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
                            </li>
                            <li>
                                <p>Порог: {{ $page->threshold_speed }} миллисекунд</p>
                            </li>
                            <li>
                                <b>Комментарий: </b>{{ strlen($page->comment) > 40 ? mb_substr($page->comment, 0, 40) . '...' : $page->comment}}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        {{ $sites->links('layouts.pagination') }}
    </ul>
@endsection
