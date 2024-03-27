@php
    function recursion($arr, $nesting = 0) {
        foreach ($arr as $key => $value) {
            if (is_array($value)) {
                echo '<p>' . str_repeat('&nbsp;', $nesting) . $key . ':' .  '</p>' .'<br>';
                recursion($value, $nesting + 1);
            } else {
                echo '<p style="margin: 0">' . str_repeat('&nbsp;', $nesting) . '[' . $key . ' => ' . $value . ']' . '</p>' . '<br>';
            }
        }
    }

@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white">
            {{ __('Все проверки API поинтов') }}
        </h2>
    </x-slot>
    <h1>API POINTS</h1>

    <x-filter-form :fields="[
            ['name' => 'name', 'label' => 'Название API', 'type' => 'text'],
            ['name' => 'url', 'label' => 'URL эндпоинта', 'type' => 'text'],
            ['name' => 'request_data', 'label' => 'Request-параметры', 'type' => 'text'],
            ['name' => 'response_data', 'label' => 'Response-параметры', 'type' => 'text'],
            ['name' => 'service', 'label' => 'Название сервиса', 'type' => 'text'],
            ['name' => 'created_at', 'label' => 'Дата проверки', 'type' => 'datetime-local'],
        ]">
    </x-filter-form>
    @if(!empty($apiPoints) && count($apiPoints) > 0 )

        <div class="container m-5">
            @foreach($apiPoints as $apiPoint)
                @php
                    $requestData = json_decode($apiPoint->request_data, true);
                    $responseData = json_decode($apiPoint->response_data, true);
                @endphp

                <div class="card mb-3">
                    <div class="card-header">
                        <h4 class="mb-0">Проверка №{{ $apiPoint->id }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-3">
                                    <div class="card-header"><strong>Подробности API</strong></div>
                                    <div class="card-body">
                                        <p><a href="{{ route('api-point.show', ['id' => $apiPoint->id]) }}"
                                              class="text-decoration-none">{{ $apiPoint->name }}</a></p>
                                        <p>URL: {{ $apiPoint->url }}</p>
                                        <p>Сервис: {{ $apiPoint->service }}</p>
                                        <p>Дата проверки: {{ $apiPoint->created_at }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if(!empty($apiPoint->api_history))
                                    <div class="card">
                                        <div class="card-header"><strong>История API</strong></div>
                                        <ul class="list-group list-group-flush">
                                            @foreach($apiPoint->api_history as $apiPointHistory)
                                                <li class="list-group-item">
                                                    <p>ID: {{ $apiPointHistory->id }}</p>
                                                    <p>Статус-код: {{ $apiPointHistory->status_code }}</p>
                                                    <p>Время отклика: {{ $apiPointHistory->response_time }}</p>
                                                    <p>Дата проверки: {{ $apiPointHistory->created_at }}</p>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <p><strong>Request data:</strong></p>
                                <div class="json-block" style="max-height: 300px; overflow-y: auto">
<pre class="bg-light p-2 rounded">
<code>
@json($requestData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
</code>
</pre>
                                </div>
                                <button class="btn btn-link json-toggle">Развернуть</button>
                            </div>
                            <div class="col-12 mt-3">
                                <p><strong>Response data:</strong></p>
                                <div class="json-block" style="max-height: 300px; overflow-y: auto">
<pre class="bg-light p-2 rounded">
<code>
@json($responseData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
</code>
</pre>
                                </div>
                                <button class="btn btn-link json-toggle">Развернуть</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <h1 class="text-center mt-5">Ничего не найдено!</h1>
    @endif
    <div class="mx-5">
        {{ $apiPoints->links() }}
    </div>

    @section('script')
        <script>
            document.querySelectorAll('.json-toggle').forEach(function (button) {
                button.addEventListener('click', function () {
                    const block = this.previousElementSibling;
                    if (block.style.maxHeight === '300px') {
                        block.style.maxHeight = 'none';
                        this.textContent = 'Свернуть';
                    } else {
                        block.style.maxHeight = '300px';
                        this.textContent = 'Развернуть';
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>
