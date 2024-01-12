@if ($paginator->hasPages())
    <div class="single-widget">
        <ul class="list d-flex flex-wrap justify-content-between align-items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 disabled">
                    <span>&laquo;</span>
                </li>
            @else
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 disabled"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 active">
                                <span>{{ $page }}</span>
                            </li>
                        @else
                            {{-- <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </li> --}}
                            <a class="btn btn-outline-primary text-dark m-1 flex-grow-1"  href="{{ $url }}">
                                <li >{{ $page }}</li>
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
                </li>
            @else
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 disabled">
                    <span>&raquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
