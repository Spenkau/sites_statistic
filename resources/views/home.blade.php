{{--@extends('layouts.app')--}}

{{--@section('header')--}}
{{--    <div>--}}
{{--        <a href="site/create" style="padding: 20px; border: 1px solid green; border-radius: 20px">Создать новый сайт</a>--}}
{{--    </div>--}}
{{--    <div>--}}
{{--        @dump(auth()->user()->id)--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--    <h1>Это главная страница</h1>--}}
{{--    --}}{{--    @dump($sites)--}}
{{--    <ul class="list-unstyled">--}}
{{--        @foreach($sites as $site)--}}
{{--            <li style="position: relative; border: 1px solid black; display: flex; flex-direction: column; gap: 5px; margin-bottom: 20px; padding: 20px">--}}
{{--                <div style="display: flex; justify-content: space-between">--}}
{{--                    <a href="/site/{{ $site->id }}">{{ $site->id }} | {{ $site->name }}</a>--}}
{{--                    <span style="padding: 20px">Дата создания: {{ $site->created_at }}</span>--}}
{{--                </div>--}}

{{--                <p><b>URL: </b><a href="{{ $site->url }}" target="_blank">{{ $site->url }}</a></p>--}}

{{--                <p>--}}
{{--                    Комментарий:--}}
{{--                    {{ strlen($site->comment) > 40 ? mb_substr($site->comment, 0, 40) . '...' : $site->comment}}--}}
{{--                </p>--}}


{{--                @if(count($site->pages) > 0)--}}
{{--                    <ul>--}}
{{--                        Страницы:--}}
{{--                        @foreach($site->pages as $page)--}}
{{--                            <li>--}}
{{--                                <p>URL: {{ $page->url }}</p>--}}
{{--                                <p>Порог: {{ $page->threshold_speed }} миллисекунд</p>--}}
{{--                                <p>--}}
{{--                                    Комментарий:--}}
{{--                                    {{ strlen($page->comment) > 40 ? mb_substr($page->comment, 0, 40) . '...' : $page->comment}}--}}
{{--                                </p>--}}
{{--                            </li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}

{{--                <div style="position: absolute; bottom: 20px; right: 20px;">--}}
{{--                    <a href="/site/{{ $site->id }}/edit" style="margin-right: 10px;">Изменить</a>--}}
{{--                    <input type="hidden" value="{{ $site->id }}" id="site_id">--}}
{{--                    <button--}}
{{--                            class="delete-btn"--}}
{{--                            style="border: none; outline: none; background-color: white; cursor: pointer"--}}
{{--                            data-id="{{ $site->id }}"--}}
{{--                    >--}}
{{--                        Удалить--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </li>--}}
{{--        @endforeach--}}
{{--        {{ $sites->links('layouts.pagination') }}--}}
{{--    </ul>--}}
{{--@endsection--}}

{{--@section('script')--}}
{{--    <script type="text/javascript">--}}
{{--        const csrfToken = document.querySelector('meta[name="csrf-token"]').content;--}}

{{--        document.querySelectorAll('.delete-btn').forEach((btn) => {--}}
{{--            btn.addEventListener('click', () => {--}}
{{--                const siteId = btn.getAttribute('data-id');--}}

{{--                fetch(`/site/${siteId}`, {--}}
{{--                    method: 'DELETE',--}}
{{--                    headers: {--}}
{{--                        'X-CSRF-Token': csrfToken,--}}
{{--                        'Content-Type': 'application/json'--}}
{{--                    },--}}
{{--                    credentials: 'same-origin'--}}
{{--                }).then(response => response.json())--}}
{{--                    .then(data => console.log(data))--}}
{{--                    .catch(error => {--}}
{{--                        console.error('Error: ', error)--}}
{{--                    })--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
