@if ($paginator->hasPages())
    <ul class="pagination" style="display: flex; justify-content: center; list-style-type: none;">
        @if (!$paginator->onFirstPage())
            <li style="margin-right: 10px;"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"><</a></li>
{{--        @else--}}
{{--            <li class="disabled" style="margin-right: 10px;"><span><</span></li>--}}
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled" style="margin-right: 10px;"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" style="margin-right: 10px;"><span>{{ $page }}</span></li>
                    @else
                        <li style="margin-right: 10px;"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li style="margin-right: 10px;"><a href="{{ $paginator->nextPageUrl() }}" rel="next">></a></li>
{{--        @else--}}
{{--            <li class="disabled" style="margin-right: 10px;"><span>></span></li>--}}
        @endif
    </ul>
@endif
