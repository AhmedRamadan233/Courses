@if ($paginator->hasPages())
    <div class="single-widget">
        <ul class="list d-flex flex-wrap justify-content-between align-items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 disabled">
                    <span>Previous</span>
                </li>
            @else
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1">
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
                </li>
            @else
                <li class="btn btn-outline-primary text-dark m-1 flex-grow-1 disabled">
                    <span>Next</span>
                </li>
            @endif
        </ul>
    </div>
@endif
