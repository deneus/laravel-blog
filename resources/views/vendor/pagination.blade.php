@if ($paginator->hasPages())
    <ul class="pager list-group list-group-horizontal">

        @if ($paginator->onFirstPage())
            <li class="disabled list-group-item"><span>← Previous</span></li>
        @else
            <li class="list-group-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled list-group-item"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active list-group-item"><span>{{ $page }}</span></li>
                    @else
                        <li class="list-group-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li class="list-group-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled list-group-item"><span>Next →</span></li>
        @endif
    </ul>
@endif
