<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl py-3 text-white">
            {{ __('Подробности API точек') }}
        </h2>
    </x-slot>
    <h1>API POINTS</h1>
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
    <ul class="list-unstyled m-5" id="sites-list">
    @foreach($apiPoints as $apiPoint)
        <li class="list-group-item">
            <p>{{ $apiPoint->id }}</p>
            <a href="{{ route('api-point.show', ['id' => $apiPoint->id]) }}">{{ $apiPoint->name }}</a>
            <p>{{ $apiPoint->url }}</p>
            <p>{{ $apiPoint->service }}</p>
            <p>{{ $apiPoint->created_at }}</p>
            <p>{{ $apiPoint->updated_at }}</p>
            @if(!empty($apiPoint->api_history))
                <ul class="list-group">
                    @foreach($apiPoint->api_history as $apiPointHistory)
                        <li class="list-group-item">
                            <p>{{ $apiPointHistory->id }}</p>
                            <p>{{ $apiPointHistory->status_code }}</p>
                            <p>{{ $apiPointHistory->response_time }}</p>
                            <p>{{ $apiPointHistory->created_at }}</p>
                            <p>{{ $apiPointHistory->updated_at }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
    </ul>
</x-app-layout>
