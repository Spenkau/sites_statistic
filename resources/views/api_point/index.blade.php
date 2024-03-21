<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white">
            {{ __('Все проверки API поинтов') }}
        </h2>
    </x-slot>
    <h1>API POINTS</h1>
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
    {{--    @php--}}
    {{--        function printVals($arr) {--}}
    {{--            foreach ($arr as $key => $value) {--}}
    {{--                $nesting = 0;--}}
    {{--                if (is_string($value)) {--}}
    {{--                    try {--}}
    {{--                        $decoded = json_decode($value, true);--}}
    {{--                        if ($decoded != null && is_array($decoded)) {--}}
    {{--                            $value = $decoded;--}}
    {{--                        }--}}
    {{--                    } catch (Exception $e) {--}}
    {{--                        echo $e;--}}
    {{--                    }--}}
    {{--                }--}}
    {{--                if (is_array($value)) {--}}
    {{--                    $nesting += 1;--}}
    {{--                    printVals($value);--}}
    {{--                } else {--}}
    {{--                    echo str_repeat(' ', $nesting)  . print_r($key) . ': ' . print_r($value) . '<br>';--}}
    {{--                }--}}
    {{--            }--}}
    {{--        }--}}
    {{--        $arr = $apiPoints;--}}

    {{--        printVals($apiPoints);--}}
    {{--    @endphp--}}
    <ul class="m-5" id="sites-list">
        @foreach($apiPoints as $apiPoint)
            <li class="list-group-item">
                <p>Проверка №{{ $apiPoint->id }}</p>
                <span>
                Подробности API
                <a href="{{ route('api-point.show', ['id' => $apiPoint->id]) }}">{{ $apiPoint->name }}</a>
            </span>
                <p>URL - {{ $apiPoint->url }}</p>
                <p>Сервис - {{ $apiPoint->service }}</p>
                <p>
                    request data:
                    <br>
                    @php
                        $response = json_decode($apiPoint->request_data, true);

                        if (empty($response)) {echo 'null';} else {recursion($response);}
                    @endphp
                </p>
                <p>
                    response data:
                    <br>
                <div style="max-height: 300px; overflow-y: auto">
                    @php
                        $response = json_decode($apiPoint->response_data, true);

                        recursion($response)
                    @endphp
                </div>

                </p>
                <p>Дата проверки - {{ $apiPoint->created_at }}</p>
                @if(!empty($apiPoint->api_history))
                    <ul class="list-group">
                        @foreach($apiPoint->api_history as $apiPointHistory)
                            <li class="list-group-item">
                                <p>ID: {{ $apiPointHistory->id }}</p>
                                <p>Статус-код: {{ $apiPointHistory->status_code }}</p>
                                <p>Время отклика: {{ $apiPointHistory->response_time }}</p>
                                <p>Дата проверки: {{ $apiPointHistory->created_at }}</p>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
    </ul>
    <div class="mx-5">
        {{ $apiPoints->links() }}
    </div>
</x-app-layout>
