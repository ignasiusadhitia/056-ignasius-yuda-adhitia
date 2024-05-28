<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
        @endif

        @foreach ($paginator->links() as $link)
            <li class="page-item @if ($link->isActive()) active @endif">
                <a class="page-link" href="{{ $link->url }}">{{ $link->label }}</a>
            </li>
        @endforeach

        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
            </li>
        @else
            <li class="page-item disabled"><a class="page-link" href="#">&raquo;</a></li>
        @endif
    </ul>
</nav>
